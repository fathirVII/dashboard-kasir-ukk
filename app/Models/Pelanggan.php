<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = ['id_pelanggan', 'nama','alamat', 'no_telepon','is_deleted'];
    protected $table = 'pelanggan';

    //memberi tahu bahwa table produk menggunakan primary key id_pelanggan tipe data string dan non auto_incremen
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';

    public function pembelian():HasMany
    {
        return $this->hasMany(Penjualan::class,'id_pelanggan','id_pelanggan');
    }
}
