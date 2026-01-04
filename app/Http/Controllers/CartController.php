<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $carts->sum(function ($cart) {
            return ($cart->product->price ?? 0);
        });

        $shipping = 10000;
        $tax = $subtotal * 0.1;
        $total = $subtotal + $shipping + $tax;

        return view('User.Home.Cart', compact(
            'carts',
            'subtotal',
            'shipping',
            'tax',
            'total'
        ));
    }
    public function store(Request $request, Product $product)
    {
        $exists = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if ($exists) {
            return back()->with('info', 'Produk sudah ada di keranjang');
        }

        Cart::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function destroy(Cart $cart)
    {
        // Security: pastikan cart milik user
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('success', 'Produk dihapus dari keranjang 🗑️');
    }


    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return back()->with('success', 'Keranjang dikosongkan 🧹');
    }

    public function transaction(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'post_code' => 'required|string',
            'phone_number' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'total_amount' => 'required|integer',
        ]);

        $proofPath = $request->file('photo')->store('proofs', 'public');

        ProductTransaction::create([
            'user_id' => Auth::id(),
            'total_amount' => $request->total_amount,
            'address' => $request->address,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'phone_number' => $request->phone_number,
            'notes' => $request->notes,
            'proof' => $proofPath,
        ]);

        // Optional: kosongkan cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Pesanan berhasil dibuat, menunggu verifikasi 💙');
    }
}
