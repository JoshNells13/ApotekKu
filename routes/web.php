<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthBuyerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [HomeController::class, 'ShowCategory'])->name('category.show');
Route::get('/detail/{slug}', [HomeController::class, 'Detail'])->name('product.detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');



Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')->middleware('role:owner');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index')->middleware('role:buyer');
        Route::post('/{product:slug}', [CartController::class, 'store'])->name('store')->middleware('role:buyer');
        Route::delete('/{cart}', [CartController::class, 'destroy'])->name('destroy')->middleware('role:buyer');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear')->middleware('role:buyer');
        Route::post('/cart/transaction', [CartController::class, 'transaction'])->name('transaction')->middleware('role:buyer');
    });


    Route::resource('transactions', ProductTransactionController::class)->middleware('role:owner|buyer');
    Route::get('/my-transactions', [ProductTransactionController::class, 'myTransactions'])
        ->name('transactions.my')->middleware('role:buyer');
    // Admin
    Route::prefix('admin')
        ->name('admin.')
        ->middleware('role:owner')
        ->group(function () {
            Route::resource('products', ProductController::class);
            Route::resource('categories', CategoryController::class);
        });
});


require __DIR__ . '/auth.php';
