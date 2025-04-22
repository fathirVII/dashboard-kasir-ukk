<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('kasir', KasirController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('produk', ProdukController::class);
Route::resource('penjualan', PenjualanController::class);