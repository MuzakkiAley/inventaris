@extends('layouts.inventaris')

@section('title', 'Daftar Supplier')

@section('content')
<h2>🏢 Daftar Supplier</h2>
<a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">+ Tambah Supplier</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th>Jumlah Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($suppliers as $key => $s)
        <tr>
            <td>{{ $suppliers->firstItem() + $key }}</td>
            <td>{{ $s->nama_supplier }}</td>
            <td>{{ $s->kontak ?? '-' }}</td>
            <td>{{ $s->alamat ?? '-' }}</td>
            <td>{{ $s->barangs_count }}</td>
            <td>
                <a href="{{ route('supplier.show', $s->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('supplier.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('supplier.destroy', $s->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada supplier.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $suppliers->links() }}
@endsection