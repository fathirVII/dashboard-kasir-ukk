<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->string('id_pelanggan',10)->primary();
            $table->string('nama',100);
            $table->string('alamat',200);
            $table->string('no_telepon',20);
            $table->timestamps();
        });
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('id_penjualan',10)->primary();
            $table->string('id_pelanggan',10);
            $table->timestamp('tanggal_penjualan')->useCurrent();
            $table->unsignedInteger('total_pembayaran');
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->delete('cascade');
        });
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk',10)->primary();
            $table->string('nama',100);
            $table->unsignedInteger('harga');
            $table->unsignedInteger('stok')->default(0);
            $table->timestamps();
        });
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->string('id_detail',10)->primary();
            $table->string('id_penjualan',10);
            $table->string('id_produk',10);
            $table->unsignedInteger('jumlah_barang');
            $table->unsignedInteger('sub_total');
            $table->timestamps();
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan')->delete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('pelanggan');
    }
};