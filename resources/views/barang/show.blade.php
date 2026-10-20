@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<h2>👤 Detail Barang</h2>
<a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card">
    <div class="card-body">
        <h4>{{ $barang->nama_barang }}</h4>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Kode:</strong> {{ $barang->kode_barang }}</p>
                <p><strong>Kategori:</strong> {{ $barang->kategori->nama_kategori }}</p>
                <p><strong>Supplier:</strong> {{ $barang->supplier->nama_supplier ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Stok:</strong> {{ $barang->stok }} (minimal {{ $barang->stok_minimal }})</p>
                <p><strong>Harga:</strong> Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>
                <p><strong>Keterangan:</strong> {{ $barang->keterangan ?? '-' }}</p>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-4">Riwayat Transaksi</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($barang->transaksis as $t)
        <tr>
            <td>{{ $t->tanggal->format('d-m-Y') }}</td>
            <td>
                @if($t->tipe === 'masuk')
                <span class="badge bg-success">Masuk</span>
                @else
                <span class="badge bg-danger">Keluar</span>
                @endif
            </td>
            <td>{{ $t->jumlah }}</td>
            <td>{{ $t->keterangan ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Belum ada transaksi.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection