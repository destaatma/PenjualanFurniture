@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="fw-bold mt-4 bg-light p-3 rounded text-muted">Dashboard</h1>

            <div class="row">
                <!-- Kategori -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-list-alt text-primary" style="font-size: 40px;"></i>
                                <h5 class="fw-bold mt-2 text-muted">Kategori</h5>
                                <p class="fw-bold text-dark text-muted">{{ $kategoriCount }} Data</p>
                            </div>
                        </div>
                        <div class="card-footer text-primary bg-primary">
                            <a class="small text-light fw-bold" href="/admin/kategori" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Produk -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-box-open text-warning" style="font-size: 40px;"></i>
                                <h5 class="fw-bold mt-2 text-muted">Produk</h5>
                                <p class="fw-bold text-dark text-muted">{{ $produkCount }} Data</p>
                            </div>
                        </div>
                        <div class="card-footer text-warning bg-warning">
                            <a class="small text-light fw-bold" href="/admin/produk" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pemesanan -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-shopping-cart text-success" style="font-size: 40px;"></i>
                                <h5 class="fw-bold mt-2 text-muted">Pemesanan</h5>
                                <p class="fw-bold text-dark text-muted">{{ $pemesananCount }} Data</p>
                            </div>
                        </div>
                        <div class="card-footer text-success bg-success">
                            <a class="small text-light fw-bold" href="/admin/pemesanan" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pengguna -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fas fa-user text-danger" style="font-size: 40px;"></i>
                                <h5 class="fw-bold mt-2 text-muted">Pengguna</h5>
                                <p class="fw-bold text-dark text-muted">{{ $userCount }} Data</p>
                            </div>
                        </div>
                        <div class="card-footer text-danger bg-danger">
                            <a class="small text-light fw-bold" href="/admin/users" style="text-decoration: none;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Grafik Penjualan -->
                <div class="col-xl-12 mt-3">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-light">
                            <h5 class="fw-bold mt-2">
                                <i class="fas fa-chart-line me-2"></i> Grafik Penjualan
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="grafikPenjualan"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('grafikPenjualan').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ],
                    datasets: [{
                        label: "Produk Terjual",
                        backgroundColor: "rgba(13, 202, 240, 1)",
                        borderColor: "rgba(13, 202, 240, 1)",
                        data: [4215, 5312, 6251, 7841, 9821, 14984, 12300, 11000, 13400, 14000, 13800, 14500],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: {
                                maxTicksLimit: 12
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: 15000,
                            ticks: {
                                stepSize: 3000
                            },
                            grid: {
                                display: true
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>

    {{--
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('#datatablesSimple tbody tr');
            rows.forEach(function (row) {
                var text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    </script>
    --}}

@endsection