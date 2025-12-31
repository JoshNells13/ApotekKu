<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}',[HomeController::class,'ShowCategory'])->name('ShowCategory');


Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ROUTE UNTUK SEMUA USER (admin & pembeli)
    |--------------------------------------------------------------------------
    */

    Route::middleware(['role:admin'])->prefix('admin')->group(function () {

        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('transaction',ProductTransactionController::class);
    });


    Route::middleware(['role:pembeli'])->group(function () {

        Route::get('/products', [ProductController::class, 'index'])
            ->name('products.index');

        Route::post('/cart', [CartController::class, 'store'])
            ->name('cart.store');

        Route::post('/checkout', [ProductTransactionController::class, 'store'])
            ->name('checkout.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
