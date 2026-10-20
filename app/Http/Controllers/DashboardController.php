<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalKategori = Kategori::count();
        $totalSupplier = Supplier::count();
        $totalTransaksi = Transaksi::count();

        $stokMenipis = Barang::whereColumn('stok', '<=', 'stok_minimal')
            ->with('kategori')
            ->orderBy('stok', 'asc')
            ->get();

        $transaksiTerbaru = Transaksi::with('barang')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBarang', 'totalKategori', 'totalSupplier', 'totalTransaksi',
            'stokMenipis', 'transaksiTerbaru'
        ));
    }
}