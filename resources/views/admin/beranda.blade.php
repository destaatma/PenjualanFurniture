@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4 ">
            <h1 class=" fw-bold mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                 <li class="breadcrumb-item fw-bold"><a>Dashboard</a></li>
            </ol>
            <div class="row">
            <!-- Kategori -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-list-alt text-primary" style="font-size: 40px;"></i>
                            <h5 class="fw-bold mt-2">Kategori</h5>
                        </div>
                    </div>
                    <div class="card-footer text-primary bg-primary">
                        <a class="small text-light fw-bold" href="/admin/kategori" style="text-decoration: none;">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Produk -->
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-box-open text-warning" style="font-size: 40px;"></i>
                            <h5 class="fw-bold mt-2">Produk</h5>
                        </div>
                    </div>
                    <div class="card-footer text-warning bg-warning">
                        <a class="small text-light fw-bold" href="/admin/produk" style="text-decoration: none;">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Pemesanan -->
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-shopping-cart text-success" style="font-size: 40px;"></i>
                            <h5 class="fw-bold mt-2">Pemesanan</h5>
                        </div>
                    </div>
                    <div class="card-footer text-success bg-success">
                        <a class="small text-light fw-bold" href="/admin/pemesanan" style="text-decoration: none;">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Pengguna -->
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-user text-danger" style="font-size: 40px;"></i>
                            <h5 class="fw-bold mt-2">Pengguna</h5>
                        </div>
                    </div>
                    <div class="card-footer text-danger bg-danger">
                        <a class="small text-light fw-bold" href="/admin/users" style="text-decoration: none;">View Details</a>
                    </div>
                </div>
            </div>
                <div class="col-xl-12 mt-3">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-light">
                           <h5 class="fw-bold mt-2">
                                <i class="fas fa-chart-line me-2"></i> Grafik Penjualan
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-primary text-light">
                        <h5 class="fw-bold mt-2">
                            <i class="fas fa-table me-2"></i> Data Produk
                        </h5>
                    </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th class="text-center">No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tfoot>
                                    <th class="text-center">No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('#datatablesSimple tbody tr');

            rows.forEach(function(row) {
                var text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    </script>

@endsection
