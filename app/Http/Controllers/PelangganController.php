<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Dom\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class PelangganController extends Controller
{


    public function search(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where('nama', 'like', "%$search%")
                ->orWhere('kategori', 'like', "%$search%");
        }

        $Pelanggan = $query->get();

        return view('Pelanggan.index', compact('Pelanggan'));
    }


    // public function search(Request $request)
    // {
    //     $query = $request->input('search');

    //     $produk = DB::table('produk')
    //         ->whereRaw('nama LIKE ? OR kategori LIKE ?', ["%$query%", "%$query%"])
    //         ->get();

    //     return view('produk.index', compact('produk'));
    // }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

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


        $lastPelanggan = Pelanggan::orderBy('id_pelanggan', 'desc')->first();

        if ($lastPelanggan) {
            $lastNumber = (int) substr($lastPelanggan->id_pelanggan, 3);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $newId = 'PLG' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Pelanggan::create([
            'id_pelanggan' => $newId,
            'nama' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        // Dapatkan URL sebelumnya
        $previousUrl = url()->previous(); // atau request()->headers->get('referer')

        // auto fill selection
        $namaPelanggan = $request->username;

        // Cek apakah user datang dari halaman kasir/create
        if (strpos($previousUrl, '/kasir/create') !== false) {
            return redirect()->route('kasir.create',['namaPelanggan' => $namaPelanggan])->with('success', 'Pelanggan berhasil ditambahkan.');
        }

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan/edit-pelanggan', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }





    public function index(Request $request)
    {
 

        $query = Pelanggan::with('pembelian')->where('is_deleted', false);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%$search%");
        }
      

        $jumlahPelanggan = $query->count();

        if ($jumlahPelanggan === 0 && $request->has('search')) {
            return redirect()->route('pelanggan.index')->with('alert', 'Nama Pelanggan Tidak Ada yang sesuai');
        }

        $dataPelanggan = $query->paginate(10);
        $dataPenjualan = Penjualan::all();

        return view('pelanggan/dashboard-pelanggan', [
            'i' => ($dataPelanggan->currentPage() - 1) * $dataPelanggan->perPage() + 1,
            'dataPelanggan' => $dataPelanggan,
            'dataPenjualan' => $dataPenjualan
        ]);
    }
}
