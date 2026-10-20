<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'tipe', 'jumlah', 'tanggal', 'keterangan'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    // Update stok otomatis saat transaksi dibuat
    protected static function booted()
    {
        static::created(function ($transaksi) {
            $barang = $transaksi->barang;
            if ($transaksi->tipe === 'masuk') {
                $barang->increment('stok', $transaksi->jumlah);
            } else {
                $barang->decrement('stok', $transaksi->jumlah);
            }
        });
    }
}