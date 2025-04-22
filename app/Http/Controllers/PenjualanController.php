<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PenjualanController extends Controller
{
    public function index(): View
    {
        return view('penjualan/dashboard-penjualan');
    }
}
