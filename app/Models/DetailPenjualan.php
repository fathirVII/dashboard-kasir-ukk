<?php

namespace App\Models;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $fillable = ['id_detail','id_penjualan','id_produk','jumlah_barang','sub_total'];
    protected $table = 'detail_penjualan';

    //memberi tahu bahwa table produk menggunakan primary key id_detail tipe data string dan non auto_incremen
    protected $primaryKey = 'id_detail';
    public $incrementing = false;
    protected $keyType = 'string';

    public function penjualan(): BelongsTo
    {
        return $this->BelongsTo(penjualan::class, 'id_penjualan', 'id_penjualan');
    }
    public function produk(): BelongsTo
    {
        return $this->BelongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}