@extends('layouts.user.main')

@section('content')
    <div class="container">
        <!-- Heading -->
        <h2 class="mb-5 mt-4 fw-bold text-secondary text-center" style="font-size: 2.6rem;">
            KERANJANG BELANJA
        </h2>
        <h4 class="mb-5 text-secondary fs-5 text-center">
            Wah, keranjang belanjamu masih kosong – Ayok isi dengan produk furniture pilihanmu!
        </h4>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (empty($keranjangs))
            <div class="alert alert-warning text-center">Keranjang Anda kosong.</div>
        @else
            <!-- Tabel Keranjang -->
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjangs as $id => $item)
                                    <tr>
                                        <td class="text-start">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $item['gambar']) }}" alt="Produk"
                                                    class="me-3 rounded" width="60" height="60">
                                                <div><strong>{{ $item['nama'] }}</strong></div>
                                            </div>
                                        </td>
                                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                        <td>
                                            <input type="number" name="jumlah"
                                                class="form-control text-center quantity-input"
                                                data-id="{{ $id }}" min="1"
                                                value="{{ $item['jumlah'] }}" style="width: 70px; margin: auto;">
                                        </td>
                                        <td>Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                                        <td>
                                            <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Total dan Checkout -->
                    <div class="row justify-content-end">
                        <div class="col-md-6 col-lg-4 border p-4 rounded bg-light">
                            @php
                                $subtotal = array_sum(array_map(fn($item) => $item['harga'] * $item['jumlah'], $keranjangs));
                            @endphp

                            <h5 class="fw-bold">Subtotal:</h5>
                            <p class="text-primary fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>

                            <hr class="my-3">

                            <h5 class="fw-bold">Total Keseluruhan:</h5>
                            <p class="text-primary fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>

                            <hr class="my-3">

                            <div class="mt-4">
                                @auth
                                    <button id="bayarSekarang" class="btn btn-success w-100">Beli Sekarang</button>
                                @else
                                    <a href="{{ url('/login') }}" class="btn btn-warning w-100">Login untuk Checkout</a>
                                @endauth

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
   document.getElementById('bayarSekarang')?.addEventListener('click', function () {
    // Kumpulkan data keranjang dari halaman (misal dari input jumlah)
    const keranjangs = [];
    document.querySelectorAll('.quantity-input').forEach(input => {
        keranjangs.push({
            id: input.dataset.id,
            jumlah: parseInt(input.value)
        });
    });

    fetch("{{ route('payment.pay') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            keranjangs: keranjangs
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.snap_token) {
            snap.pay(data.snap_token, {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!");
                    window.location.href = "{{ route('payment.success') }}";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran.");
                    window.location.href = "{{ route('payment.success') }}";
                },
                onError: function(result){
                    alert("Pembayaran gagal.");
                },
                onClose: function(){
                    alert("Popup ditutup tanpa menyelesaikan pembayaran.");
                }
            });
        } else if (data.error) {
            alert(data.error);
        } else {
            alert("Gagal membuat transaksi.");
        }
    })
    .catch(err => {
        console.error(err);
        alert("Terjadi kesalahan.");
    });
});

</script>
@endpush

