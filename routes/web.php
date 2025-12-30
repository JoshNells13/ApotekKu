<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\TransactionDetailController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();


Route::middleware(['auth'])->group(function () {


    Route::middleware(['role:admin'])->prefix('admin')->group(function () {


        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('products', ProductController::class);


        Route::get('/transactions', [ProductTransactionController::class, 'index'])
            ->name('admin.transactions.index');

        Route::get('/transactions/{transaction}', [TransactionDetailController::class, 'show'])
            ->name('admin.transactions.show');
    });


    Route::middleware(['role:pembeli'])->group(function () {

        // Product browsing
        Route::get('/products', [ProductController::class, 'index'])
            ->name('products.index');

        Route::get('/products/{product}', [ProductController::class, 'show'])
            ->name('products.show');

        // Cart
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
        Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

        // Checkout
        Route::post('/checkout', [ProductTransactionController::class, 'store'])
            ->name('checkout.store');
    });

});
