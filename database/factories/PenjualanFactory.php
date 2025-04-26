<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelanggan;

class PenjualanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_penjualan' => 'PJN' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            // Ambil id_pelanggan acak dari tabel pelanggan jika tidak ada generate factory pelanggan
            'id_pelanggan' => Pelanggan::inRandomOrder()->first()?->id_pelanggan ?? Pelanggan::factory(),
            'tanggal_penjualan' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total_pembayaran' => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
