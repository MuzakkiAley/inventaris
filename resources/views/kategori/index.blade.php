@extends('layouts.inventaris')

@section('title', 'Daftar Kategori')

@section('content')
<h2>📂 Daftar Kategori</h2>
<a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Jumlah Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kategoris as $key => $k)
        <tr>
            <td>{{ $kategoris->firstItem() + $key }}</td>
            <td>{{ $k->nama_kategori }}</td>
            <td>{{ $k->deskripsi ?? '-' }}</td>
            <td>{{ $k->barangs_count }}</td>
            <td>
                <a href="{{ route('kategori.show', $k->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada kategori.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $kategoris->links() }}
@endsection