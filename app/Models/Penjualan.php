<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['id_penjualan','id_pelanggan','jenis_pembayaran','nominal_pembayaran','total_pembayaran','tanggal_penjualan'];
    protected $table = 'penjualan';

    //memberi tahu bahwa table produk menggunakan primary key id_penjualan tipe data string dan non auto_incremen
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false;
    protected $keyType = 'string';

    public function pembeli():BelongsTo
    {
        return $this->BelongsTo(Pelanggan::class,'id_pelanggan','id_pelanggan');
    }
    public function detail(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }
}
