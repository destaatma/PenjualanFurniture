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
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanans as $pesanan)
                                        <tr>
                                            <td><strong>#{{ $pesanan->id }}</strong></td>
                                            <td>{{ $pesanan->created_at->format('d M Y') }}</td>

                                            {{-- Tampilkan nama-nama produk --}}
                                            <td>
                                                @foreach ($pesanan->detailPemesanan as $detail)
                                                    <div>
                                                        • {{ $detail->produk->nama }}
                                                        <span class="text-muted small">({{ $detail->jumlah_produk }}x)</span>
                                                    </div>
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
                                                <a href="{{ route('detailpesanan', $pesanan->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <p class="mb-0">Anda belum memiliki riwayat pesanan.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Pagination Links --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{ $pesanans->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection