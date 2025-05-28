@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Data Pemesanan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.pemesanan.index') }}"
                        class="text-info">Dashboard</a></li>
                <li class="breadcrumb-item active">Pemesanan</li>
            </ol>

            <div class="mb-3 d-flex gap-2">
                <a href="{{ route('admin.transaksi.pemesanan.create') }}" class="btn btn-warning">
                    <i class="fas fa-plus-circle me-1"></i> Tambah
                </a>
                <a href="{{ route('admin.transaksi.detail_pemesanan.index') }}" class="btn btn-info">
                    Detail Pemesanan
                </a>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-shopping-cart me-1"></i> Daftar Pemesanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Detail Pemesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Status Pemesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanans as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->detail_pemesanan->produk->nama ?? '-' }}</td>
                                        <td>{{ $p->user->nama ?? '-' }}</td>
                                        <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->format('d-m-Y') }}</td>
                                        <td>{{ ucfirst($p->status_pemesanan) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.transaksi.detail_pemesanan.index') }}"
                                                    class="btn btn-info btn-sm" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.transaksi.pemesanan.edit', $p->id) }}"
                                                    class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.transaksi.pemesanan.destroy', $p->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')"
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