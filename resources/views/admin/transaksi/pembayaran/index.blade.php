@extends('layouts.admin.app')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>

        <a href="/admin/pembayaran/create" class="btn btn-success mb-3 col-mb-3">Tambah</a>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-credit-card me-1"></i> Daftar Pembayaran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Pemesanan</th>
                                <th>Token</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayarans as $p)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $p->pemesanan->detail_pemesanan->produk->nama }}</td>
                                    <td>{{ $p->token }}</td>
                                    <td>Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                                    <td>{{ $p->tanggal_pembayaran }}</td>
                                    <td>{{ $p->status_pembayaran }}</td>
                                    <td>
                                    <div class="action-buttons d-flex gap-2">
                                            <a href="{{ route('admin.transaksi.pembayaran.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.transaksi.pembayaran.destroy', $p->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">
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
