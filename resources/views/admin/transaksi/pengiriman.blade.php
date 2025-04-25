@extends('layouts.admin.app')

@section('content')

<style>
    .container .col-md-6 {
        max-width: 500px; /* Membatasi ukuran form */
    }

    .form-control-sm {
        padding: 6px;
    }

    .card-header i {
        margin-right: 8px; /* Agar ikon lebih dekat dengan teks */
    }
    html {
            scroll-behavior: smooth;
        }
</style>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pengiriman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengiriman</li>
        </ol>

        <!-- Form Pengiriman -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-truck"></i> Tambah Pengiriman Baru
            </div>
            <div class="card-body">
                <div class="container">
                            <form>

                                <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="shipment_id" class="form-label">ID Pengiriman</label>
                                    <input type="text" class="form-control form-control-sm" id="shipment_id" name="shipment_id" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="order_id" class="form-label">ID Pemesanan</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id" name="order_id" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="shipment_date" class="form-label">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control form-control-sm" id="shipment_date" name="shipment_date" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="status" class="form-label">Status Pengiriman</label>
                                    <select class="form-select form-select-sm" id="status" name="status">
                                        <option value="pending">Dalam Proses</option>
                                        <option value="shipped">Dikirim</option>
                                        <option value="delivered">Tiba di Tujuan</option>
                                        <option value="failed">Gagal</option>
                                    </select>
                                </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Simpan Pengiriman</button>
                            </form>
                        </div>
                    </div>
                </div>

        <!-- Daftar Pengiriman -->
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
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3002</td>
                            <td>1002</td>
                            <td>2025-04-21</td>
                            <td><span class="badge bg-warning">Dalam Proses</span></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
