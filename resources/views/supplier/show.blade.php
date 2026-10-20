@extends('layouts.inventaris')

@section('title', 'Detail Supplier')

@section('content')
<h2>🏢 Detail Supplier</h2>
<a href="{{ route('supplier.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card">
    <div class="card-body">
        <h4>{{ $supplier->nama_supplier }}</h4>
        <p><strong>Kontak:</strong> {{ $supplier->kontak ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $supplier->alamat ?? '-' }}</p>
        <hr>
        <h5>Barang dari Supplier Ini ({{ $supplier->barangs->count() }})</h5>
        <ul>
            @forelse($supplier->barangs as $b)
            <li>{{ $b->nama_barang }} ({{ $b->kode_barang }}) - Stok: {{ $b->stok }}</li>
            @empty
            <li>Belum ada barang dari supplier ini.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection