<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            return ($cart->product->price ?? 0) * $cart->quantity;
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

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $exists = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->exists();

        if ($exists) {
            return back()->with('info', 'Produk sudah ada di keranjang ');
        }

        Cart::create([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang ');
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
            'address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'phone_number' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            $carts = Cart::where('user_id', Auth::id())->with('product')->get();

            $total = $carts->sum(fn($c) => $c->product->price);

            $transaction = ProductTransaction::create([
                'user_id' => Auth::id(),
                'total_amount' => $total,
                'is_paid' => false,
                'address' => $request->address,
                'city' => $request->city,
                'post_code' => $request->post_code,
                'phone_number' => $request->phone_number,
                'notes' => $request->notes
            ]);

            foreach ($carts as $cart) {
                TransactionDetail::create([
                    'product_transaction_id' => $transaction->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->product->price
                ]);
            }

            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created');
    }
}
