<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Hapus produk
        $produk->delete();

        return redirect()->route('produk.index')->with('delete', 'Produk berhasil dihapus.');
    }


    public function create(): View
    {
        return view('produk/tambah-produk');
    }

    public function store(Request $request)
    {

        dd($request);

        $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'required|in:handphone & aksesoris,komputer & aksesoris,audio visual,peralatan rumah tangga elektronik',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        // Ambil ID produk terakhir
        $lastProduk = Produk::orderBy('id_produk', 'desc')->first();
        $nextNumber = $lastProduk ? (int) substr($lastProduk->id_produk, 3) + 1 : 1;

        // Format ID Produk menjadi PLG0001, PLG0002, dst.
        $newId = 'PRO' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Produk::create([
            'id_produk' => $newId,
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    public function edit($id_produk)
    {
        // Menemukan data pelanggan berdasarkan ID
        $produk = Produk::findOrFail($id_produk);

        // Menampilkan form edit dengan data pelanggan
        return view('produk/edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'required|in:handphone & aksesoris,komputer & aksesoris,audio visual,peralatan rumah tangga elektronik',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Update data produk
        $produk->update([
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function index(): View
    {
        $dataProduk = Produk::all();

        return view('produk/dashboard-produk',compact('dataProduk'));
    }
}
