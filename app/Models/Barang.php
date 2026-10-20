<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang', 'nama_barang', 'kategori_id', 'supplier_id',
        'stok', 'stok_minimal', 'harga', 'keterangan'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'barang_id');
    }

    // Cek stok menipis
    public function getStokMenipisAttribute()
    {
        return $this->stok <= $this->stok_minimal;
    }
}