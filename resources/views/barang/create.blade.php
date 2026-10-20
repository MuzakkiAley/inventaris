@extends('layouts.inventaris')

@section('title', 'Tambah Barang')

@section('content')
<h2>➕ Tambah Barang</h2>
<a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<form action="{{ route('barang.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label>Supplier (opsional)</label>
            <select name="supplier_id" class="form-control">
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $s)
                <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="0" required>
        </div>
        <div class="col-md-3 mb-3">
            <label>Stok Minimal</label>
            <input type="number" name="stok_minimal" class="form-control" value="5" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="0" required>
        </div>
        <div class="col-12 mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="2"></textarea>
        </div>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection