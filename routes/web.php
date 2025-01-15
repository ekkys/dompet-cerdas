<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('categories', CategoryController::class);
Route::resource('wallets', WalletController::class);
Route::resource('transactions', TransactionController::class);
