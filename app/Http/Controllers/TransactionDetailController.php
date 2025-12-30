<?php

namespace App\Http\Controllers;

use App\Models\ProductTransaction;

class TransactionDetailController extends Controller
{
    public function show(ProductTransaction $transaction)
    {
        $transaction->load('details.product');
        return view('transactions.show', compact('transaction'));
    }
}
