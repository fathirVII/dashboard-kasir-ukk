<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Contracts\View\View;

class ProdukController extends Controller
{
    public function index(): View
    {
        $dataProduk = Produk::all();

        return view('produk/dashboard-produk',compact('dataProduk'));
    }
}
