@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>

        <!-- Form Pembayaran -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-credit-card"></i> Tambah Pembayaran Baru
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="pemesananID" class="form-label">ID Pemesanan</label>
                        <input type="text" class="form-control" id="pemesananID" name="pemesananID" required>
                    </div>

                    <div class="mb-3">
                        <label for="metodePembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metodePembayaran" name="metodePembayaran">
                            <option value="transfer">Transfer Bank</option>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="e_wallet">E-Wallet</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahBayar" class="form-label">Jumlah Bayar</label>
                        <input type="number" class="form-control" id="jumlahBayar" name="jumlahBayar" required>
                    </div>

                    <div class="mb-3">
                        <label for="statusPembayaran" class="form-label">Status Pembayaran</label>
                        <select class="form-select" id="statusPembayaran" name="statusPembayaran">
                            <option value="pending">Menunggu Pembayaran</option>
                            <option value="completed">Selesai</option>
                            <option value="failed">Gagal</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
                </form>
            </div>
        </div>

        <!-- Daftar Pembayaran -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-list-alt"></i> Daftar Pembayaran
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Pemesanan</th>
                            <th>Metode Pembayaran</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>Transfer Bank</td>
                            <td>Rp 2.500.000</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1002</td>
                            <td>E-Wallet</td>
                            <td>Rp 1.750.000</td>
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
</main>
@endsection
