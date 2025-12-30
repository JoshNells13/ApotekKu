<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_transaction_id',
        'product_id',
        'price',
    ];

    public function transaction()
    {
        return $this->belongsTo(ProductTransaction::class, 'product_transaction_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
