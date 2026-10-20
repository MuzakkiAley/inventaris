<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return redirect()->route('barang.index');
});

Route::resource('barang', BarangController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('supplier', SupplierController::class);
Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');