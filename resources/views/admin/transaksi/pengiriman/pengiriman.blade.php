@extends('layouts.admin.app')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pengiriman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengiriman</li>
        </ol>

        <!-- Daftar Pengiriman -->
        <a href="/admin/pengiriman/create" class="btn btn-success mb-3 col-3">Tambahkan Pengiriman</a>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-table me-1"></i> Daftar Pengiriman
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Pengiriman</th>
                            <th>ID Pemesanan</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Status Pengiriman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3001</td>
                            <td>1001</td>
                            <td>2025-04-22</td>
                            <td><span class="badge bg-success">Tiba di Tujuan</span></td>
                            <td>
                                <a href="/admin/transaksi/pengiriman/edit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3002</td>
                            <td>1002</td>
                            <td>2025-04-21</td>
                            <td><span class="badge bg-warning">Dalam Proses</span></td>
                            <td>
                                <a href="/admin/transaksi/pengiriman/edit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
