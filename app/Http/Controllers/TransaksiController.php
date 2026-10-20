<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang')->latest()->paginate(15);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();
        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tipe' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Cek stok cukup untuk transaksi keluar
        if ($request->tipe === 'keluar' && $barang->stok < $request->jumlah) {
            return back()->withErrors(['jumlah' => 'Stok tidak cukup! Stok tersedia: ' . $barang->stok])->withInput();
        }

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dicatat! Stok barang sudah diperbarui.');
    }
}