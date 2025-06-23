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
                    <div class="card mb-5">
                        <div class="card-header bg-primary text-light">
                            <h5 class="fw-bold mt-2">
                                <i class="fas fa-chart-line me-2"></i> Grafik Penjualan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                <canvas id="grafikPenjualan"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch(@json(route('chart.penjualan')))
                .then(response => response.json())
                .then(data => {
                    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const formattedLabels = data.labels.map(label => {
                        const [monthName, year] = label.split(' ');
                        const monthIndex = new Date(Date.parse(monthName + " 1, 2020")).getMonth();
                        return `${monthNames[monthIndex]} ${year}`;
                    });

                    const ctx = document.getElementById('grafikPenjualan').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: formattedLabels,
                            datasets: [
                                {
                                    label: 'Pembayaran Selesai',
                                    data: data.selesai,
                                    borderColor: '#28a745',
                                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                                    tension: 0.4,
                                    fill: false,
                                    pointBackgroundColor: '#28a745',
                                    pointBorderColor: '#ffffff',
                                    pointBorderWidth: 2,
                                    pointRadius: 6,
                                    pointHoverRadius: 8,
                                    pointStyle: 'circle'
                                },
                                {
                                    label: 'Pembayaran Belum Selesai',
                                    data: data.belum,
                                    borderColor: '#ffc107',
                                    backgroundColor: 'rgba(255, 193, 7, 0.1)',
                                    tension: 0.4,
                                    fill: false,
                                    pointBackgroundColor: '#ffc107',
                                    pointBorderColor: '#ffffff',
                                    pointBorderWidth: 2,
                                    pointRadius: 6,
                                    pointHoverRadius: 8,
                                    pointStyle: 'rectRot'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 1000,
                                easing: 'easeOutCubic'
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {
                                        usePointStyle: true
                                    }
                                },
                                tooltip: {
                                    backgroundColor: '#191d21',
                                    titleColor: '#fff',
                                    bodyColor: '#fff',
                                    borderColor: '#fff',
                                    borderWidth: 1,
                                    usePointStyle: true
                                }
                            },
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Bulan',
                                        font: { size: 14 }
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Pembayaran',
                                        font: { size: 14 }
                                    }
                                }
                            }
                        }
                    });
                });
        });
    </script>

@endsection