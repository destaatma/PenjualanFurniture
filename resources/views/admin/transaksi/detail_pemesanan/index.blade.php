@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Detail Pemesanan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.transaksi.detail_pemesanan.index') }}" class="text-info">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Detail Pemesanan</li>
            </ol>
            <div class="mb-3 d-flex gap-2">
                <a href="{{ route('admin.transaksi.detail_pemesanan.create') }}" class="btn btn-warning">
                    <i class="fas fa-plus-circle me-1"></i> Tambah
                </a>
                <a href="{{ route('admin.transaksi.pemesanan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>


            <div class="card mb-4">
                <div class="card-header bg-info text-white">
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
                                        <td>{{ $d->produk->nama ?? 'Produk tidak ditemukan' }}</td>
                                        <td>{{ $d->jumlah_produk }}</td>
                                        <td>Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($d->harga_subtotal, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.transaksi.detail_pemesanan.edit', $d->id) }}"
                                                    class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.transaksi.detail_pemesanan.destroy', $d->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus detail pemesanan ini?')"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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
