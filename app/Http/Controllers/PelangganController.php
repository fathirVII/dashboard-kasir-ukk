<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Produk;


class PelangganController extends Controller
{


    public function search(Request $request)
    {
        $query = Produk::query();

        // Cek apakah ada input pencarian
        if ($request->has('search')) {
            $search = $request->input('search');

            // Menambahkan kondisi pencarian untuk nama dan kategori produk
            $query->where('nama', 'like', "%$search%")
                ->orWhere('kategori', 'like', "%$search%");
        }

        // Mendapatkan hasil pencarian
        $produk = $query->get();

        // Mengembalikan hasil pencarian ke view
        return view('produk.index', compact('produk'));
    }


    // public function search(Request $request)
    // {
    //     $query = $request->input('search');

    //     // Menggunakan query builder untuk SQL kasar
    //     $produk = DB::table('produk')
    //         ->whereRaw('nama LIKE ? OR kategori LIKE ?', ["%$query%", "%$query%"])
    //         ->get();

    //     // Mengembalikan hasil pencarian ke view
    //     return view('produk.index', compact('produk'));
    // }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        // Tandai sebagai terhapus (soft delete)
        $pelanggan->update(['is_deleted' => true]);

        return redirect()->route('pelanggan.index')->with('delete', 'Pelanggan berhasil dihapus.');
    }


    public function create(): View
    {
        return view('pelanggan/tambah-pelanggan');
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'no_telepon' => 'nullable|string|max:20',
        ]);


        // Ambil ID pelanggan terakhir
        $lastPelanggan = Pelanggan::orderBy('id_pelanggan', 'desc')->first();

        if ($lastPelanggan) {
            // Ambil angka dari ID terakhir, misalnya dari "PLG0004" ambil 4
            $lastNumber = (int) substr($lastPelanggan->id_pelanggan, 3);
            $nextNumber = $lastNumber + 1;
        } else {
            // Jika belum ada data sama sekali
            $nextNumber = 1;
        }

        // Format jadi PLG0001, PLG0002, dst.
        $newId = 'PLG' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Simpan data
        Pelanggan::create([
            'id_pelanggan' => $newId,
            'nama' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Menemukan data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Menampilkan form edit dengan data pelanggan
        return view('pelanggan/edit-pelanggan', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        // Mencari data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Update data pelanggan
        $pelanggan->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        // Redirect kembali ke halaman pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }





    public function index(): View
    {
        $dataPelanggan = Pelanggan::with('pembelian')->where('is_deleted', false)->get();
        $dataPenjualan = Penjualan::all();

        return View('pelanggan/dashboard-pelanggan', ['i' => 1], compact('dataPelanggan', 'dataPenjualan'));
    }
}
