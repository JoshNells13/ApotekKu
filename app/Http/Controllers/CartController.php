<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        return back()->with('success', 'Product added to cart');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Cart removed');
    }
}
