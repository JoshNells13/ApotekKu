<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/', [CartController::class, 'store'])->name('store');
        Route::delete('/{cart}', [CartController::class, 'destroy'])->name('destroy');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
        Route::post('/cart/transaction',[CartController::class, 'transaction'])->name('transaction');
    });


    // Admin

    Route::prefix('admin')
        ->name('admin.')
        ->middleware('role:owner')
        ->group(function () {

            Route::resource('products', ProductController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('transactions', ProductTransactionController::class);
        });

});


require __DIR__ . '/auth.php';
