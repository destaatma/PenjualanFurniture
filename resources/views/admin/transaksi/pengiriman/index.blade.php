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
                <div class="card-header bg-primary">
                    <i class="fas fa-truck me-1"></i> Daftar Pengiriman
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>pemesanan</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Status Pengiriman</th>
                                    <th>Aksi</th>
                                </tr>
                            <tbody>
                                @foreach ($pengirimans as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        {{-- Menampilkan Nama Customer dan Daftar Produk --}}
                                        <td>
                                            <strong>{{ $p->pemesanan->user->nama ?? '-' }}</strong><br>
                                            <small>
                                                @foreach ($p->pemesanan->detailPemesanan as $detail)
                                                    • {{ $detail->produk->nama }}<br>
                                                @endforeach
                                            </small>
                                        </td>

                                        <td>{{ \Carbon\Carbon::parse($p->tanggal_pengiriman)->format('d-m-Y') }}</td>
                                        <td>{{ $p->status_pengiriman }}</td>

                                        <td>
                                            <div class="action-buttons d-flex gap-2">
                                                <a href="{{ route('admin.transaksi.pengiriman.edit', $p->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.transaksi.pengiriman.destroy', $p->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengiriman ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
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