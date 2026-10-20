@extends('layouts.app')

@section('title', 'Catat Transaksi')

@section('content')
<h2>➕ Catat Transaksi Stok</h2>
<a href="{{ route('transaksi.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Barang</label>
        <select name="barang_id" class="form-control" required>
            <option value="">-- Pilih Barang --</option>
            @foreach($barangs as $b)
            <option value="{{ $b->id }}" {{ old('barang_id') == $b->id ? 'selected' : '' }}>
                {{ $b->nama_barang }} ({{ $b->kode_barang }}) — Stok: {{ $b->stok }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tipe Transaksi</label>
        <select name="tipe" class="form-control" required>
            <option value="masuk" {{ old('tipe') == 'masuk' ? 'selected' : '' }}>Masuk (tambah stok)</option>
            <option value="keluar" {{ old('tipe') == 'keluar' ? 'selected' : '' }}>Keluar (kurangi stok)</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', 1) }}" min="1" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
        </div>
    </div>

    <div class="mb-3">
        <label>Keterangan (opsional)</label>
        <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan') }}</textarea>
    </div>

    <button class="btn btn-success">Simpan Transaksi</button>
</form>
@endsection