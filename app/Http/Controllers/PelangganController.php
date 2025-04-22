<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class PelangganController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        return redirect()->route('dashboard.pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $penjualanOld = Pelanggan::findOrFail($id);
        return View('Pelanggan-edit', compact('penjualan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telepon'),
        ]);

        return redirect()->route('dashboard.pelanggan')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function index(): View
    {
        $dataPelanggan = Pelanggan::with('pembelian')->get();
        $dataPenjualan = Penjualan::all();

        return View('pelanggan/dashboard-pelanggan', ['i' => 1], compact('dataPelanggan', 'dataPenjualan'));
    }
}
