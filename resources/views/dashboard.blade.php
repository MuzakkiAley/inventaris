@extends('layouts.inventaris')

@section('title', 'Dashboard')

@section('content')
<h2>📊 Dashboard Inventaris</h2>
<p class="text-muted">Ringkasan data sistem inventaris</p>

<div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h6>Total Barang</h6>
                <h2>{{ $totalBarang }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h6>Total Kategori</h6>
                <h2>{{ $totalKategori }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h6>Total Supplier</h6>
                <h2>{{ $totalSupplier }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h6>Total Transaksi</h6>
                <h2>{{ $totalTransaksi }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                ⚠️ Stok Menipis ({{ $stokMenipis->count() }})
            </div>
            <div class="card-body">
                @forelse($stokMenipis as $b)
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>{{ $b->nama_barang }} ({{ $b->kode_barang }})</span>
                    <span class="badge bg-danger">{{ $b->stok }} / min {{ $b->stok_minimal }}</span>
                </div>
                @empty
                <p class="text-muted">Semua stok aman ✅</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                🔄 Transaksi Terbaru
            </div>
            <div class="card-body">
                @forelse($transaksiTerbaru as $t)
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>{{ $t->barang->nama_barang }}</span>
                    <span>
                        @if($t->tipe === 'masuk')
                        <span class="badge bg-success">+{{ $t->jumlah }}</span>
                        @else
                        <span class="badge bg-danger">-{{ $t->jumlah }}</span>
                        @endif
                    </span>
                </div>
                @empty
                <p class="text-muted">Belum ada transaksi.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection