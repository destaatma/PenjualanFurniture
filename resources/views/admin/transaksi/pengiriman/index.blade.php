@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Data Pengiriman</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengiriman</li>
            </ol>

            <a href="{{ route('admin.transaksi.pengiriman.create') }}" class="btn btn-warning mb-3 col-mb-3">
                <i class="fas fa-plus-circle"></i> Tambah Produk
            </a>
            <div class="card mb-4">
                <div class="card-header bg-info">
                    <i class="fas fa-truck me-1"></i> Daftar Pengiriman
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Pemesanan</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Status Pengiriman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengirimans as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->pemesanan->id }}</td>
                                        <td>{{ $p->tanggal_pengiriman }}</td>
                                        <td>{{ $p->status_pengiriman }}</td>
                                        <td>
                                            <div class="action-buttons d-flex gap-2">
                                                <a href="{{ route('admin.transaksi.pengiriman.edit', $p->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.transaksi.pengiriman.destroy', $p->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengiriman ini?')">
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
