<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert(
            [
                [
                    'id_produk' => 'PRD0001',
                    'nama' => 'laptop lenovo thinkpad seri X020 2019',
                    'kategori' => 'komputer & aksesoris',
                    'harga' => 28000000,
                    'stok' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_produk' => 'PRD0002',
                    'nama' => 'laptop ASUS ROG Zephyrus G GA502DU 2019',
                    'kategori' => 'komputer & aksesoris',
                    'harga' => 17800000,
                    'stok' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_produk' => 'PRD0003',
                    'nama' => 'Charger lenovo 60wat ori',
                    'kategori' => 'komputer & aksesoris',
                    'harga' => 150000,
                    'stok' => 25,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_produk' => 'PRD0004',
                    'nama' => 'haedphone gamming RGB Stereo',
                    'kategori' => 'komputer & aksesoris',
                    'harga' => 200000,
                    'stok' => 15,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]
        );
    }
}
