@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<h2>✏️ Edit Barang</h2>
<a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategoris as $k)
                <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label>Supplier (opsional)</label>
            <select name="supplier_id" class="form-control">
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $s)
                <option value="{{ $s->id }}" {{ $barang->supplier_id == $s->id ? 'selected' : '' }}>
                    {{ $s->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
        </div>
        <div class="col-md-3 mb-3">
            <label>Stok Minimal</label>
            <input type="number" name="stok_minimal" class="form-control" value="{{ $barang->stok_minimal }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
        </div>
        <div class="col-12 mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="2">{{ $barang->keterangan }}</textarea>
        </div>
    </div>
    <button class="btn btn-warning">Update</button>
</form>
@endsection