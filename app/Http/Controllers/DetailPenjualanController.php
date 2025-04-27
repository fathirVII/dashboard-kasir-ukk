<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DetailPenjualanController extends Controller
{
    public function index(Request $request):View
    {   
        $id_penjualan = $request->input('id_penjualan');
        $urlBack = $request->input('urlBack');
        
        $penjualan = Penjualan::with(['detail.produk', 'pembeli'])->findOrFail($id_penjualan);
        return view('penjualan/detail-penjualan', compact('penjualan','urlBack'));
    }
}
