@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold">Detail Pesanan #{{ $pesanan->id }}</h2>
                        <p class="text-muted mb-0">Dipesan pada: {{ $pesanan->created_at->format('d F Y, H:i') }}</p>
                    </div>
                    <a href="/pesanan-saya" class="btn btn-outline-secondary">
                        &larr; Kembali ke Riwayat
                    </a>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-light">
                        <strong>Rincian Produk</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <tbody>
                                    @foreach ($pesanan->detailPemesanan as $detail)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                                                    alt="{{ $detail->produk->nama }}" class="img-thumbnail" width="80">
                                            </td>
                                            <td>
                                                {{ $detail->produk->nama }} <br>
                                                <small class="text-muted">{{ $detail->jumlah_produk }} x Rp
                                                    {{ number_format($detail->harga, 0, ',', '.') }}</small>
                                            </td>
                                            <td class="text-end">
                                                <strong>Rp {{ number_format($detail->harga_subtotal, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="2" class="text-end fw-bold">Total Harga:</td>
                                        <td class="text-end fw-bold fs-5">Rp
                                            {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center pt-3">
                                            @php
                                                $status = optional($pesanan->pembayaran->first())->status_pembayaran;
                                            @endphp

                                            <div class="fw-bold">Status Pembayaran:</div>
                                            @if ($status === 'Selesai')
                                                <span class="badge bg-success fs-6 mt-1">Dibayar</span>
                                            @elseif ($status === 'Menunggu')
                                                <span class="badge bg-warning text-dark fs-6 mt-1">Menunggu Pembayaran</span>
                                            @elseif ($status === 'Dikonfirmasi')
                                                <span class="badge bg-primary text-white fs-6 mt-1">Dikonfirmasi</span>
                                            @else
                                                <span class="badge bg-secondary fs-6 mt-1">Belum Ada Pembayaran</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Jika pembayaran belum lunas, tampilkan tombol bayar --}}
                @if($pesanan->status_pembayaran == 'Menunggu Pembayaran')
                    <div class="text-center mt-4">
                        <p>Selesaikan pembayaran untuk pesanan ini.</p>
                        <form action="{{ route('bayar-langsung') }}" method="POST" class="ms-2 flex-grow-1">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            {{-- Warna dikembalikan ke btn-primary --}}
                            <button type="submit" class="btn btn-primary w-100 h-100">Bayar Sekarang</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
