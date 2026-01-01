<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductTransactionController extends Controller
{
    public function index()
    {
        $transactions = ProductTransaction::with('user')
            ->latest()
            ->get();

        return view('Admin.transaction.index', compact('transactions'));
    }

    public function store(Request $request)
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
