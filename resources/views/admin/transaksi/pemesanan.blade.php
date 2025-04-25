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
        <h1 class="mt-4">Pemesanan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pemesanan Produk</li>
        </ol>

        <!-- Form Pemesanan -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-shopping-cart"></i> Tambah Pemesanan Baru
            </div>
            <div class="card-body">
                <div class="container">
                            <form>
                                <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="order_id" class="form-label">ID Pemesanan</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id" name="order_id" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="product_id" class="form-label">Produk</label>
                                    <select class="form-select form-select-sm" id="product_id" name="product_id">
                                        <option value="1">Produk A</option>
                                        <option value="2">Produk B</option>
                                        <option value="3">Produk C</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="total_price" class="form-label">Total Harga</label>
                                    <input type="number" class="form-control form-control-sm" id="total_price" name="total_price" required min="1">
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="order_date" class="form-label">Tanggal Pemesanan</label>
                                    <input type="date" class="form-control form-control-sm" id="order_date" name="order_date" required>
                                </div>

                                <div class="mb-2 col-mb-6">
                                    <label for="status" class="form-label">Status Pemesanan</label>
                                    <select class="form-select form-select-sm" id="status" name="status">
                                        <option value="Diproses">Diproses</option>
                                        <option value="Dikirim">Dikirim</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Dibatalkan">Dibatalkan</option>
                                    </select>
                                </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>

        <!-- Daftar Pemesanan -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-table me-1"></i> Daftar Pemesanan
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Pemesanan</th>
                            <th>Produk</th>
                            <th>Total Harga</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>Produk A</td>
                            <td>Rp 750.000</td>
                            <td>2025-04-20</td>
                            <td><span class="badge bg-success">Diproses</span></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1002</td>
                            <td>Produk B</td>
                            <td>Rp 500.000</td>
                            <td>2025-04-22</td>
                            <td><span class="badge bg-danger">Dibatalkan</span></td>
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
