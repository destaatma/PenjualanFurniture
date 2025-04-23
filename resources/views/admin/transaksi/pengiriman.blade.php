@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pengiriman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengiriman</li>
        </ol>

        <!-- Form Pengiriman -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-truck"></i> Tambah Pengiriman Baru
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="pemesananID" class="form-label">ID Pemesanan</label>
                        <input type="text" class="form-control" id="pemesananID" name="pemesananID" required>
                    </div>

                    <div class="mb-3">
                        <label for="namaKurir" class="form-label">Nama Kurir</label>
                        <input type="text" class="form-control" id="namaKurir" name="namaKurir" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggalPengiriman" class="form-label">Tanggal Pengiriman</label>
                        <input type="date" class="form-control" id="tanggalPengiriman" name="tanggalPengiriman" required>
                    </div>

                    <div class="mb-3">
                        <label for="statusPengiriman" class="form-label">Status Pengiriman</label>
                        <select class="form-select" id="statusPengiriman" name="statusPengiriman">
                            <option value="pending">Dalam Proses</option>
                            <option value="shipped">Dikirim</option>
                            <option value="delivered">Tiba di Tujuan</option>
                            <option value="failed">Gagal</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Pengiriman</button>
                </form>
            </div>
        </div>

        <!-- Daftar Pengiriman -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-list-alt"></i> Daftar Pengiriman
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Pemesanan</th>
                            <th>Nama Kurir</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>JNE Express</td>
                            <td>2025-04-22</td>
                            <td><span class="badge bg-success">Tiba di Tujuan</span></td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1002</td>
                            <td>SiCepat</td>
                            <td>2025-04-21</td>
                            <td><span class="badge bg-warning">Dalam Proses</span></td>
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
