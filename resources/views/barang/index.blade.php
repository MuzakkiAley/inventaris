@extends('layouts.inventaris')

@section('title', 'Daftar Barang')

@section('content')
<h2>📦 Daftar Barang</h2>
<a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ Tambah Barang</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Supplier</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($barangs as $key => $b)
        <tr>
            <td>{{ $barangs->firstItem() + $key }}</td>
            <td>{{ $b->kode_barang }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->kategori->nama_kategori }}</td>
            <td>{{ $b->supplier->nama_supplier ?? '-' }}</td>
            <td>
                @if($b->stok_menipis)
                <span class="badge bg-danger">{{ $b->stok }}</span>
                @else
                <span class="badge bg-success">{{ $b->stok }}</span>
                @endif
            </td>
            <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('barang.show', $b->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data barang.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $barangs->links() }}
@endsection