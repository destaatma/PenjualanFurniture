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
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>

        <!-- Form Pembayaran -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-credit-card"></i> Tambah Pembayaran Baru
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12"> <!-- Membuat form lebih kecil -->
                            <form>
                                <div class="mb-2">
                                    <label for="payment_id" class="form-label">ID Pembayaran</label>
                                    <input type="text" class="form-control form-control-sm" id="payment_id" name="payment_id" required>
                                </div>

                                <div class="mb-2">
                                    <label for="order_id" class="form-label">ID Pemesanan</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id" name="order_id" required>
                                </div>

                                <div class="mb-2">
                                    <label for="token" class="form-label">Token Pembayaran</label>
                                    <input type="text" class="form-control form-control-sm" id="token" name="token" required>
                                </div>

                                <div class="mb-2">
                                    <label for="amount" class="form-label">Jumlah Bayar</label>
                                    <input type="number" class="form-control form-control-sm" id="amount" name="amount" required>
                                </div>

                                <div class="mb-2">
                                    <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                                    <input type="date" class="form-control form-control-sm" id="payment_date" name="payment_date" required>
                                </div>

                                <div class="mb-2">
                                    <label for="status" class="form-label">Status Pembayaran</label>
                                    <select class="form-select form-select-sm" id="status" name="status">
                                        <option value="pending">Menunggu Pembayaran</option>
                                        <option value="completed">Selesai</option>
                                        <option value="failed">Gagal</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Simpan Pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Pembayaran -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-list-alt"></i> Daftar Pembayaran
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
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
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
