<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ProdukController extends Controller
{
    public function index(): View
    {
        return view('produk/dashboard-produk');
    }
}
