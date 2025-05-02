@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>

            <!-- Daftar Produk -->
            <a href="#" class="btn btn-success mb-3 col-3">Tambahkan Kategori</a>
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-table me-1"></i> Daftar Kategori
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Detail_Pemesanan_Id</th>
                                    <th>User_Id</th>
                                    <th>Total_Harga</th>
                                    <th>Tanggal_Pemesanan</th>
                                    <th>Status_Pemesanan</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($pemesanans as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->detail_pemesanan_id }}</td>
                                        <td>{{ $p->user_id }}</td>
                                        <td>{{ $p->total_harga }}</td>
                                        <td>{{ $p->tanggal_pemesanan }}</td>
                                        <td>{{ $p->status_pemesanan }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
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



