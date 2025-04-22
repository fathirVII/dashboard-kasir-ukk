<?php

namespace App\Models;

use App\View\Components\detailPenjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $fillable = ['id_produk','kategori','nama', 'harga', 'stok'];
    protected $table = 'produk';

    //memberi tahu bahwa table produk menggunakan primary key id_produk tipe data string dan non auto_incremen
    protected $primaryKey = 'id_produk';
    public $incrementing = false;
    protected $keyType = 'string';

    public function detail(): HasMany
    {
        return $this->hasMany(detailPenjualan::class, 'id_detail', 'id_detail');
    }
}
