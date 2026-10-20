@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<h2>➕ Tambah Kategori</h2>
<a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection