<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PelangganController extends Controller
{
    public function index():View
    {
        return view('pelanggan/dashboard-pelanggan');
    }
}
