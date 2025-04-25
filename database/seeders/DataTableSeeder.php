<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;

class DataTableSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 10 pelanggan dengan ID khusus
        $pelanggan = Pelanggan::factory(15)->sequence(fn($sequence) => [
            'id_pelanggan' => 'PLG' . str_pad($sequence->index + 1, 4, '0', STR_PAD_LEFT),
        ])->create();

        // 2. Buat 10 penjualan terhubung ke pelanggan
        $penjualan = Penjualan::factory(20)->recycle($pelanggan)->sequence(fn($sequence) => [
            'id_penjualan' => 'PNJ' . str_pad($sequence->index + 1, 4, '0', STR_PAD_LEFT),
        ])->create();

        // 3. Buat 30 detail penjualan dari penjualan yang ada
        DetailPenjualan::factory(30)->recycle($penjualan)->sequence(fn($sequence) => [
            'id_detail' => 'DTL' . str_pad($sequence->index + 1, 4, '0', STR_PAD_LEFT),
        ])->create();
    }
}

 