@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Pemesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.detail_pemesanan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Pemesanan</li>
        </ol>

        <!-- Tambah Detail Pemesanan -->
        <a href="{{ route('admin.transaksi.detail_pemesanan.create') }}" class="btn btn-success mb-3 col-mb-3">Tambah</a>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-table me-1"></i> Daftar Detail Pemesanan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Harga Satuan</th>
                                <th>Harga Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_pemesanans as $d)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $d->produk->nama }}</td>
                                    <td>{{ $d->jumlah_produk }}</td>
                                    <td>{{ number_format($d->harga, 0, ',', '.') }}</td>
                                    <td>{{ number_format($d->harga_subtotal, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('admin.transaksi.detail_pemesanan.edit', $d->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.transaksi.detail_pemesanan.destroy', $d->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus detail pemesanan ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
