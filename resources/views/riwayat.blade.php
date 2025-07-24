@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h1 class="fw-bold">Riwayat Pesanan Saya</h1>
                    <p class="text-muted">Lacak semua transaksi dan status pesanan Anda di sini.</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                                    @forelse ($pesanans as $pesanan)
                                        <tr>
                                            <td><strong>#{{ $pesanan->id }}</strong></td>
                                            <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                                            <td>
                                                {{-- Sekarang hanya menampilkan daftar produk --}}
                                                @foreach ($pesanan->detailPemesanan as $detail)
                                                    <div>• {{ $detail->produk->nama }} <span
                                                            class="text-muted small">({{ $detail->jumlah_produk }}x)</span></div>
                                                @endforeach
                                            </td>
                                            <td class="text-end">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                @php
                                                    $status_bayar = optional($pesanan->pembayaran->first())->status_pembayaran;
                                                @endphp
                                                @if ($status_bayar === 'Selesai')
                                                    <span class="badge bg-success">Dibayar</span>
                                                @elseif ($status_bayar === 'Menunggu')
                                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                                @elseif ($status_bayar === 'Dikonfirmasi')
                                                    <span class="badge bg-primary text-white">Dikonfirmasi</span>
                                                @else
                                                    <span class="badge bg-secondary">Belum Bayar</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @php
                                                    // Variabel ini dibutuhkan juga di kolom Aksi, jadi tetap di sini
                                                    $status_kirim = optional($pesanan->pengiriman->first())->status_pengiriman;
                                                @endphp
                                                @if ($status_kirim == 'Diproses')
                                                    <span class="badge bg-info text-dark">Diproses</span>
                                                @elseif ($status_kirim == 'Dikirim')
                                                    <span class="badge bg-primary">Dikirim</span>
                                                @elseif ($status_kirim == 'Selesai')
                                                    <span class="badge bg-success">Selesai</span>
                                                @else
                                                    <span class="badge bg-secondary">Belum Diproses</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{-- MODIFIKASI: Bungkus tombol dengan div flexbox --}}
                                                <div class="d-flex justify-content-center align-items-center gap-1">

                                                    {{-- Tombol Lihat Detail --}}
                                                    <a href="{{ route('detailpesanan', $pesanan->id) }}"
                                                        class="btn btn-sm btn-primary">Lihat Detail</a>

                                                    {{-- Tombol Tulis Ulasan --}}
                                                    @if ($status_kirim == 'Selesai')
                                                        {{-- Cek apakah ada produk yang belum diulas --}}
                                                        @php
                                                            $belumDiulas = $pesanan->detailPemesanan->some(function ($detail) {
                                                                return !$detail->produk->ulasanSudahDibuatOleh(auth()->id());
                                                            });
                                                        @endphp

                                                        @if ($belumDiulas)
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-outline-success dropdown-toggle"
                                                                    type="button" id="dropdownUlasan-{{ $pesanan->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Tulis Ulasan
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownUlasan-{{ $pesanan->id }}">
                                                                    @foreach ($pesanan->detailPemesanan as $detail)
                                                                        @if (!$detail->produk->ulasanSudahDibuatOleh(auth()->id()))
                                                                            <li>
                                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                                    data-bs-target="#modalUlasan-{{ $detail->produk->id }}">
                                                                                    {{ Str::limit($detail->produk->nama, 20) }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
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


    {{-- Definisi Modal untuk Form Ulasan --}}
    @foreach ($pesanans as $pesanan)
        @foreach ($pesanan->detailPemesanan as $detail)
            @php
                $status_kirim_modal = optional($pesanan->pengiriman->first())->status_pengiriman;
            @endphp
            @if ($status_kirim_modal == 'Selesai' && !$detail->produk->ulasanSudahDibuatOleh(auth()->id()))
                <div class="modal fade" id="modalUlasan-{{ $detail->produk->id }}" tabindex="-1"
                    aria-labelledby="modalUlasanLabel-{{ $detail->produk->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="modalUlasanLabel-{{ $detail->produk->id }}">Ulasan untuk:
                                    {{ $detail->produk->nama }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('ulasans.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $detail->produk->id }}">
                                    <div class="mb-3">
                                        <label class="form-label d-block fw-bold">Beri Rating</label>
                                        <div class="star-rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" id="star-{{ $i }}-{{ $detail->produk->id }}" name="rating"
                                                    value="{{ $i }}" required>
                                                <label for="star-{{ $i }}-{{ $detail->produk->id }}" class="star">&#9733;</label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ulasan-{{ $detail->produk->id }}" class="form-label fw-bold">Ulasan Anda</label>
                                        <textarea name="ulasan" id="ulasan-{{ $detail->produk->id }}" class="form-control" rows="4"
                                            placeholder="Bagaimana pendapat Anda tentang produk ini?" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach

@endsection

@push('styles')
    <style>
        /* CSS untuk Bintang Rating */
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating .star {
            font-size: 2rem;
            color: lightgray;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]:hover~.star,
        .star-rating input[type="radio"]:checked~.star {
            color: orange;
        }

        /* CSS FINAL UNTUK PAGINATION - MENGHILANGKAN PANAH PAGINATION */
        a[rel="next"] svg,
        a[rel="prev"] svg {
            display: none !important;
        }

        ul.pagination .page-link span[aria-hidden="true"] {
            display: none !important;
        }
    </style>
@endpush