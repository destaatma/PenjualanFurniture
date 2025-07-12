@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h1 class="fw-bold">Riwayat Pesanan Saya</h1>
                    <p class="text-muted">Lacak semua transaksi dan status pesanan Anda di sini.</p>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID Pesanan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col" class="text-end">Total Harga</th>
                                        <th scope="col" class="text-center">Status Pembayaran</th>
                                        <th scope="col" class="text-center">Status Pengiriman</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- PERBAIKAN: Mengganti @forelse dengan @if/@foreach agar lebih mudah di-parsing
                                    formatter --}}
                                    @if ($pesanans->isNotEmpty())
                                        @foreach ($pesanans as $pesanan)
                                            <tr>
                                                <td><strong>#{{ $pesanan->id }}</strong></td>
                                                <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                                                <td>
                                                    @foreach ($pesanan->detailPemesanan as $detail)
                                                        <div>• {{ $detail->produk->nama }} <span
                                                                class="text-muted small">({{ $detail->jumlah_produk }}x)</span></div>
                                                    @endforeach
                                                </td>
                                                <td class="text-end">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                                <td class="text-center">
                                                    @php
                                                        $status = optional($pesanan->pembayaran->first())->status_pembayaran;
                                                    @endphp
                                                    @if ($status === 'Selesai')
                                                        <span class="badge bg-success">Dibayar</span>
                                                    @elseif ($status === 'Menunggu')
                                                        <span class="badge bg-warning text-dark">Menunggu Pembayaran</span>
                                                    @elseif ($status === 'Dikonfirmasi')
                                                        <span class="badge bg-primary text-white">Dikonfirmasi</span>
                                                    @else
                                                        <span class="badge bg-secondary">Belum Ada Pembayaran</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        // PERBAIKAN: Menggunakan ->first() karena relasi 'pengiriman' mengembalikan collection.
                                                        // Ini akan mengambil status dari data pengiriman pertama yang terkait.
                                                        $status_kirim = optional($pesanan->pengiriman->first())->status_pengiriman;
                                                    @endphp
                                                    @if ($status_kirim == 'Diproses')
                                                        <span class="badge bg-info text-dark">Diproses</span>
                                                    @elseif ($status_kirim == 'Dikirim')
                                                        <span class="badge bg-success">Dikirim</span>
                                                    @elseif ($status_kirim == 'Selesai')
                                                        <span class="badge bg-success">Selesai</span>
                                                    @else
                                                        <span class="badge bg-secondary">Belum Diproses</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('detailpesanan', $pesanan->id) }}"
                                                        class="btn btn-sm btn-primary">Lihat Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <p class="mb-0">Anda belum memiliki riwayat pesanan.</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Pagination Links --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{-- Wrapper untuk styling pagination --}}
                    <nav class="pagination-sm-custom">
                        {{ $pesanans->onEachSide(1)->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Merapikan style untuk pagination --}}
@push('styles')
    <style>
        .pagination-sm-custom .pagination {
            display: flex;
            /* Membuat item pagination berjajar horizontal */
            flex-wrap: wrap;
            /* Memastikan bisa turun baris jika tidak muat */
            justify-content: center;
            /* Memusatkan pagination */
            margin-bottom: 0;
        }

        .pagination-sm-custom .page-item .page-link {
            padding: 0.25rem 0.6rem;
            /* Membuat tombol lebih kecil */
            font-size: 0.875rem;
            /* Membuat tulisan lebih kecil */
            line-height: 1.5;

            /* PERUBAHAN: Menambahkan properti ini untuk merapikan konten di dalam tombol */
            display: flex;
            align-items: center;
            gap: 0.25rem;
            /* Memberi sedikit jarak antara ikon dan teks */
        }

        .pagination-sm-custom .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #0d6efd;
            /* Warna primary Bootstrap */
            border-color: #0d6efd;
        }
    </style>
@endpush
