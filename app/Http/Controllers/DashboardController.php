<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKeuntungan = Penjualan::sum('total_pembayaran');
        $jumlahPelanggan = Pelanggan::where('is_deleted', false)->count();
        $jumlahProduk = Produk::count();
        $jumlahPenjualan = Penjualan::count();

        return view('dashboard', compact('totalKeuntungan', 'jumlahPelanggan', 'jumlahProduk', 'jumlahPenjualan'));
    }
}
