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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->name('admin.')->group(function(){
        Route::resource('/products', ProductController::class)->middleware('role:owner');
        Route::resource('/categories',CategoryController::class)->middleware('role:owner');
        Route::resource('/transaction',ProductTransactionController::class)->middleware('role:owner');
    });
});

require __DIR__ . '/auth.php';
