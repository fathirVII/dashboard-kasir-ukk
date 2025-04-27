<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Request $request): View
    {
        // $dataPenjualan = Penjualan::with('detail.produk')
        //     ->select('penjualan.*')
        //     ->join('pelanggan','pelanggan.id_pelanggan','=','penjualan.id_pelanggan')
        //     ->where('pelanggan.is_deleted',false)
        //     ->orderBy('penjualan.tanggal_penjualan', 'desc')
        //     ->paginate(10) // Tampilkan 10 data per halaman
        //     ->appends($request->all());

        $dataPenjualan = Penjualan::with(['pembeli','detail.produk'])
        ->whereHas('pembeli',function($query) {
            $query->where('is_deleted',false);
        })
        ->orderBy('tanggal_penjualan','desc')
        ->paginate(10)
        ->appends($request->all());

        $dataPenjualanHariIni = Penjualan::whereDate('tanggal_penjualan', Carbon::today())->get();
        $dataKeseluruhanHariIni = $dataPenjualanHariIni->count();

        return view('penjualan/dashboard-penjualan', [
            'dataPenjualan' => $dataPenjualan,
            'dataKeseluruhan' => $dataKeseluruhanHariIni,
            'i' => ($dataPenjualan->currentPage() - 1) * $dataPenjualan->perPage() + 1
        ]);
    }
}
