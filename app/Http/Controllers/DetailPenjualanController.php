<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Contracts\View\View;

class DetailPenjualanController extends Controller
{
    public function index($id_penjualan):View
    {
        $penjualan = Penjualan::with(['detail.produk', 'pembeli'])->findOrFail($id_penjualan);
        return view('penjualan/detail-penjualan', compact('penjualan'));
    }
}
