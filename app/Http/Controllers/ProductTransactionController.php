<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductTransactionController extends Controller
{
    public function index()
    {
        $transactions = ProductTransaction::with('user')
            ->latest()
            ->paginate(10);

        $TransactionCount = ProductTransaction::count();

        $TransactionCountPayed = ProductTransaction::where('is_paid', true)->count();

        $TransactionCountUnPayed = ProductTransaction::where('is_paid', false)->count();

        return view('Admin.transaction.index', compact('transactions', 'TransactionCount', 'TransactionCountPayed', 'TransactionCountUnPayed'));
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

    public function edit($id)
    {
        $transaction = ProductTransaction::with('user')->findOrFail($id);

        return view('admin.transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = ProductTransaction::findOrFail($id);

        $validated = $request->validate([
            'total_amount' => 'required|integer|min:0',
            'is_paid'      => 'required|boolean',
            'address'      => 'required|string|max:255',
            'city'         => 'required|string|max:100',
            'post_code'    => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'notes'        => 'nullable|string',
            'proof'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle upload bukti pembayaran
        if ($request->hasFile('proof')) {

            // hapus bukti lama (kalau ada)
            if ($transaction->proof && Storage::disk('public')->exists($transaction->proof)) {
                Storage::disk('public')->delete($transaction->proof);
            }

            $validated['proof'] = $request->file('proof')->store(
                'transaction-proofs',
                'public'
            );
        }

        $transaction->update($validated);

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }
}
