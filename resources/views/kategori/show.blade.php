@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<h2>📂 Detail Kategori</h2>
<a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card">
    <div class="card-body">
        <h4>{{ $kategori->nama_kategori }}</h4>
        <p>{{ $kategori->deskripsi ?? 'Tidak ada deskripsi' }}</p>
        <hr>
        <h5>Daftar Barang ({{ $kategori->barangs->count() }})</h5>
        <ul>
            @forelse($kategori->barangs as $b)
            <li>{{ $b->nama_barang }} ({{ $b->kode_barang }}) - Stok: {{ $b->stok }}</li>
            @empty
            <li>Belum ada barang di kategori ini.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection