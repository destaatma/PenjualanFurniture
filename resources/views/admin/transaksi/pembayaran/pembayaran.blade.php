@extends('layouts.admin.app')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
        <!-- Daftar Pembayaran -->
        <a href="/admin/transaksi/pembayaran/create" class="btn btn-success mb-3 col-3">Tambahkan Pembayaran </a>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-table me-1"></i> Daftar Pembayaran
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>ID Pemesanan</th>
                            <th>Token</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2001</td>
                            <td>1001</td>
                            <td>AB123XYZ</td>
                            <td>Rp 2.500.000</td>
                            <td>2025-04-20</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>
                                <a href="/admin/transaksi/pembayaran/edit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2002</td>
                            <td>1002</td>
                            <td>XY456LMN</td>
                            <td>Rp 1.750.000</td>
                            <td>2025-04-22</td>
                            <td><span class="badge bg-danger">Gagal</span></td>
                            <td>
                                <a href="/admin/transaksi/pembayaran/edit" class="btn btn-warning btn-sm">
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
