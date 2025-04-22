<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailPenjualanController;
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

Route::get('/detail_penjualan/{id_penjualan}',[DetailPenjualanController::class,'index'])->name('detail-penjualan.index');