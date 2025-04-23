<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Request $request): View
    {
        $dataPenjualan = Penjualan::with('detail.produk')
            ->orderBy('tanggal_penjualan', 'desc')
            ->paginate(10) // Tampilkan 10 data per halaman
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
