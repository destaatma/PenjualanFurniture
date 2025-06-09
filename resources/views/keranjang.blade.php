@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Keranjang Belanja</h2>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Jika keranjang kosong --}}
        @if (empty($keranjangs))
            <div class="alert alert-warning text-center">Keranjang Anda kosong.</div>
            <div style="height: 200px;"></div>
        @else
            {{-- Tabel Keranjang --}}
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Detail Produk</strong>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $subtotal = 0; @endphp
                            @foreach ($keranjangs as $id => $item)
                                @php
                                    $sub = $item['harga'] * $item['jumlah'];
                                    $subtotal += $sub;
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" width="80"
                                            class="img-thumbnail">
                                    </td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td>
                                        <input type="number" name="jumlah" class="form-control text-center quantity-input"
                                            data-id="{{ $id }}" min="1" value="{{ $item['jumlah'] }}" style="width: 80px;">
                                    </td>
                                    <td>Rp {{ number_format($sub, 0, ',', '.') }}</td>
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
            </div>

            {{-- Total dan Checkout --}}
            <div class="row justify-content-end mt-4">
                <div class="col-md-6 col-lg-4 border p-4 rounded bg-light">
                    <h5 class="fw-bold">Subtotal:</h5>
                    <p class="text-primary fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>

                    <hr class="my-3">

                    <h5 class="fw-bold">Total Keseluruhan:</h5>
                    <p class="text-primary fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>

                    <hr class="my-3">

                    <div class="mt-4">
                        @auth
                            <button id="bayarSekarang" class="btn btn-success w-60">Beli Sekarang</button>
                        @else
                            <a href="{{ url('/login') }}" class="btn btn-warning w-100">Login untuk Checkout</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('bayarSekarang')?.addEventListener('click', function () {
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
                body: JSON.stringify({ keranjangs: keranjangs })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.snap_token) {
                        snap.pay(data.snap_token, {
                            onSuccess: function () {
                                window.location.href = "{{ route('payment.success') }}";
                            },
                            onPending: function () {
                                window.location.href = "{{ route('payment.success') }}";
                            },
                            onError: function () {
                                alert("Pembayaran gagal.");
                            },
                            onClose: function () {
                                alert("Popup ditutup tanpa menyelesaikan pembayaran.");
                            }
                        });
                    } else {
                        alert(data.error || "Gagal membuat transaksi.");
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan.");
                });
        });
    </script>
@endpush