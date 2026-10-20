@extends('layouts.inventaris')

@section('title', 'Riwayat Transaksi')

@section('content')
<h2>🔄 Riwayat Transaksi Stok</h2>
<a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">+ Catat Transaksi</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transaksis as $key => $t)
        <tr>
            <td>{{ $transaksis->firstItem() + $key }}</td>
            <td>{{ $t->tanggal->format('d-m-Y') }}</td>
            <td>{{ $t->barang->nama_barang }} ({{ $t->barang->kode_barang }})</td>
            <td>
                @if($t->tipe === 'masuk')
                <span class="badge bg-success">Masuk</span>
                @else
                <span class="badge bg-danger">Keluar</span>
                @endif
            </td>
            <td>{{ $t->jumlah }}</td>
            <td>{{ $t->keterangan ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada transaksi.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $transaksis->links() }}
@endsection