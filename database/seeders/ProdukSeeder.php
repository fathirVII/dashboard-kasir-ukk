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
                    'nama' => 'coffe latte',
                    'kategori' => 'coffe luar',
                    'harga' => 25000,
                    'stok' => 40,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_produk' => 'PRD0002',
                    'nama' => 'coffe expreso',
                    'kategori' => 'coffe luar',
                    'harga' => 17000,
                    'stok' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_produk' => 'PRD0003',
                    'nama' => 'roti tawar',
                    'kategori' => 'roti & pestri',
                    'harga' => 3000,
                    'stok' => 50,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'id_produk' => 'PRD0004',
                    'nama' => 'roti croissant blue barry',
                    'kategori' => 'roti & pestri',
                    'harga' => 4500,
                    'stok' => 45,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]
        );
    }
}
