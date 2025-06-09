@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Pembayaran</h2>
        <p class="text-center">Silakan periksa pesanan Anda sebelum membayar.</p>

        <div class="card mb-4">
            <div class="card-header">
                <strong>Detail Produk</strong>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->detailPemesanan as $detail)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                                        alt="{{ $detail->produk->nama }}" width="80" class="img-thumbnail">
                                </td>
                                <td>{{ $detail->produk->nama }}</td>
                                <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td>{{ $detail->jumlah_produk }}</td>
                                <td>Rp {{ number_format($detail->harga_subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="table-secondary">
                            <td colspan="4" class="text-end"><strong>Total</strong></td>
                            <td><strong>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center">
            <button id="pay-button" class="btn btn-success mt-3">Bayar Sekarang</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    window.location.href = "{{ route('payment.success') }}";
                },
                onPending: function (result) {
                    window.location.href = "{{ route('payment.success') }}";
                },
                onError: function (result) {
                    alert("Pembayaran gagal.");
                },
                onClose: function () {
                    alert("Anda belum menyelesaikan pembayaran.");
                }
            });
        });
    </script>
@endpush