<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;

Route::redirect('/', '/dashboard');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::resource('kasir', KasirController::class);
Route::get('kasir', [KasirController::class,'create'])->name('kasir.create');

Route::resource('pelanggan', PelangganController::class);

Route::resource('produk', ProdukController::class);

Route::resource('penjualan', PenjualanController::class);

Route::get('/detail_penjualan/{id_penjualan}',[DetailPenjualanController::class,'index'])->name('detail-penjualan.index');