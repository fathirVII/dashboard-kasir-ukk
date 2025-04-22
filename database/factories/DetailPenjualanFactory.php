<?php

namespace Database\Factories;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPenjualanFactory extends Factory
{
    protected $model = DetailPenjualan::class;

    public function definition(): array
    {
        return [
            // Generate id_detail seperti D0001, D0002,
            'id_detail' => 'D' . $this->faker->unique()->numberBetween(1000, 9999),
            // Ambil id_penjualan yang sudah ada di tabel penjualan
            'id_penjualan' => Penjualan::factory(),
            // Ambil id_produk yang sudah ada di tabel produk
            'id_produk' => Produk::inRandomOrder()->first()?->id_produk,
            'jumlah_barang' => $this->faker->numberBetween(1, 10),
            'sub_total' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
