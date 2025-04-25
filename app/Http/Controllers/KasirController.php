<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KasirController extends Controller
{
    public function create(Request $request)
    {
        // Ambil data pelanggan dan produk
        $pelanggan = Pelanggan::where('is_deleted', false)->get();

        $query = Produk::query();

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }
        $selected = $request->kategori;
        $produk = $query->get();


        return view('kasir/kasir', compact('pelanggan', 'produk', 'selected'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'id_pelanggan' => 'required',
            'produk' => 'required|array',
            'produk.*' => 'required|exists:produk,id_produk',
            'jumlah.*' => 'required|integer|min:1',
        ]);


        // Generate ID Penjualan baru
        $lastPenjualan = Penjualan::orderBy('id_penjualan', 'desc')->first();
        $lastIdNumber = $lastPenjualan ? (int)substr($lastPenjualan->id_penjualan, 3) : 0;
        $newIdPenjualan = 'PNJ' . str_pad($lastIdNumber + 1, 4, '0', STR_PAD_LEFT);

        // create data penjualan
        $penjualan = Penjualan::create([
            'id_penjualan' => $newIdPenjualan,
            'id_pelanggan' => $request->id_pelanggan,
            'total_pembayaran' => 0,
        ]);

        $totalPembayaran = 0;

        // Ambil ID detail terakhir
        $lastDetail = DetailPenjualan::orderBy('id_detail', 'desc')->first();
        $lastDetailIdNumber = $lastDetail ? (int)substr($lastDetail->id_detail, 3) : 0;

        foreach ($request->produk as $produkId) {
            $produk = Produk::findOrFail($produkId);
            $jumlah = $request->jumlah[$produkId] ?? 1;
            $subTotal = $produk->harga * $jumlah;

            // Pengecekan stok
            if ($produk->stok < $jumlah) {
                return redirect()->route('kasir.create')->with('error', 'Stok produk ' . $produk->nama . ' tidak cukup.');
            }

            // Generate ID detail penjualan
            $newIdDetail = 'DTL' . str_pad($lastDetailIdNumber + 1, 4, '0', STR_PAD_LEFT);
            $lastDetailIdNumber++; // Naikkan counter untuk detail ID

            // Simpan detail penjualan
            DetailPenjualan::create([
                'id_detail' => $newIdDetail,
                'id_penjualan' => $penjualan->id_penjualan,
                'id_produk' => $produkId,
                'jumlah_barang' => $jumlah,
                'sub_total' => $subTotal,
            ]);

            // Kurangi stok produk
            $produk->stok -= $jumlah;
            $produk->save();

            $totalPembayaran += $subTotal;
        }

        // Update total pembayaran di penjualan
        $penjualan->update(['total_pembayaran' => $totalPembayaran]);

        return redirect()->route('kasir.create')->with('success', 'Transaksi berhasil.');
    }
}
