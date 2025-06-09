@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <div class="card shadow rounded-4">
            <div class="card-body p-5">
                @if ($pemesananTerakhir)
                    <h3 class="mb-4 text-success">🎉 Pembayaran Berhasil!</h3>
                    <p>Terima kasih, <strong>{{ Auth::user()->nama }}</strong>. Pesanan Anda telah berhasil diproses.</p>

                    <h5 class="mt-4">Detail Pemesanan:</h5>
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>ID Pemesanan:</strong> {{ $pemesananTerakhir->id }}</li>
                        <li class="list-group-item"><strong>Tanggal:</strong> {{ $pemesananTerakhir->tanggal_pemesanan }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ $pemesananTerakhir->status_pemesanan }}</li>
                        <li class="list-group-item"><strong>Total:</strong>
                            Rp{{ number_format($pemesananTerakhir->total_harga, 0, ',', '.') }}</li>
                    </ul>

                    <h5>Produk yang Dipesan:</h5>
                    <ul class="list-group mb-3">
                        @foreach ($pemesananTerakhir->detailPemesanan as $detail)
                            <li class="list-group-item">
                                <strong>{{ $detail->produk->nama }}</strong> - {{ $detail->jumlah_produk }} pcs x
                                Rp{{ number_format($detail->harga, 0, ',', '.') }} =
                                <span class="text-primary">Rp{{ number_format($detail->harga_subtotal, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="text-end">
                        <a href="{{ route('produk') }}" class="btn btn-primary">Kembali ke Belanja</a>
                    </div>
                @else
                    <h4 class="text-danger">😢 Tidak ada transaksi yang ditemukan.</h4>
                    <a href="{{ route('produk') }}" class="btn btn-warning mt-3">Kembali ke Belanja</a>
                @endif
            </div>
        </div>
    </div>
@endsection
