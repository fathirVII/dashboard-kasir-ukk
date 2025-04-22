<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View; 

class PenjualanController extends Controller
{
    public function index(): View
    {
        $dataPenjualan = penjualan::orderBy('tanggal_penjualan', 'desc')->get();
        $dataPenjualanHariIni = Penjualan::whereDate('tanggal_penjualan', Carbon::today())->get();
        $dataKeseluruhanHariIni = $dataPenjualanHariIni->count();

        return view('penjualan/dashboard-penjualan', ['dataPenjualan' => $dataPenjualan, 'dataKeseluruhan' => $dataKeseluruhanHariIni, "i" => 1]);
    }
}
