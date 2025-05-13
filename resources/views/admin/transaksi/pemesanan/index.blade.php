@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Pemesanan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Pemesanan</li>
            </ol>

            <a href="/admin/pemesanan/create" class="btn btn-success mb-3 col-mb-3">Tambah</a>
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-shopping-cart me-1"></i> Daftar Pemesanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Detail_Pemesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Total_Harga</th>
                                    <th>Tanggal_Pemesanan</th>
                                    <th>Status_Pemesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanans as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->detail_pemesanan->produk->nama }}</td>
                                        <td>{{ $p->user->nama }}</td>
                                        <td> Rp {{ number_format($p->total_harga, 0, ',', '.')}}</td>
                                        <td>{{ $p->tanggal_pemesanan }}</td>
                                        <td>{{ $p->status_pemesanan }}</td>
                                        <td>
                                        <div class="action-buttons d-flex gap-2">
                                            <a href="{{ route('admin.transaksi.detail_pemesanan.index') }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.transaksi.pemesanan.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.transaksi.pemesanan.destroy', $p->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')">
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
