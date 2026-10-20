@extends('layouts.inventaris')

@section('title', 'Tambah Supplier')

@section('content')
<h2>➕ Tambah Supplier</h2>
<a href="{{ route('supplier.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<form action="{{ route('supplier.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"></textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection