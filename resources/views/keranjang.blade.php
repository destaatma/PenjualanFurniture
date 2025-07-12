@extends('layouts.user.main')

@section('content')
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/produk">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
            </ol>
        </nav>
        <h2 class="text-center mb-4">Keranjang Belanja</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (empty($keranjangs))
            <div class="alert alert-warning text-center">Keranjang Anda kosong.</div>
            <div style="height: 200px;"></div>
        @else
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Detail Produk</strong>
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0 align-middle table-responsive-stack">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th class="text-center">Jumlah</th>
                                <th>Subtotal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $subtotal = 0; @endphp
                            @foreach ($keranjangs as $id => $item)
                                @php
                                    $sub = $item['harga'] * $item['jumlah'];
                                    $subtotal += $sub;
                                @endphp
                                {{-- PERUBAHAN 1: Tambahkan data-harga pada <tr> untuk dibaca oleh JS --}}
                                <tr data-harga="{{ $item['harga'] }}">
                                    <td data-label="Gambar" class="text-center">
                                        <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" width="80"
                                            class="img-thumbnail">
                                    </td>
                                    <td data-label="Nama Produk">{{ $item['nama'] }}</td>
                                    <td data-label="Harga Satuan">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td data-label="Jumlah">
                                        {{-- PERUBAHAN 2: Pastikan input memiliki class 'quantity-input' dan data-id --}}
                                        <input type="number" name="jumlah" class="form-control text-center quantity-input"
                                            data-id="{{ $id }}" min="1" value="{{ $item['jumlah'] }}">
                                    </td>
                                    {{-- PERUBAHAN 3: Tambahkan class 'item-subtotal' untuk update via JS --}}
                                    <td data-label="Subtotal" class="item-subtotal">Rp {{ number_format($sub, 0, ',', '.') }}</td>
                                    <td data-label="Aksi" class="text-center">
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
                <div class="col-12 col-md-6 col-lg-4 border p-4 rounded bg-light">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">Subtotal:</h5>
                        {{-- PERUBAHAN 4: Tambahkan ID untuk update via JS --}}
                        <p id="cart-subtotal" class="fw-bold fs-5">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">Total Keseluruhan:</h5>
                        {{-- PERUBAHAN 5: Tambahkan ID untuk update via JS --}}
                        <p id="cart-total" class="text-primary fw-bold fs-5">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                    <hr class="my-3">
                    <div class="mt-4">
                        @auth
                            <button id="bayarSekarang" class="btn btn-success w-100 btn-lg">Beli Sekarang</button>
                        @else
                            <a href="{{ url('/login') }}" class="btn btn-warning w-100 btn-lg">Login untuk Checkout</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    {{-- Script Midtrans tetap di sini --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    {{-- PERUBAHAN 6: Tambahkan script untuk update keranjang dinamis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fungsi untuk format angka ke Rupiah
            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }

            // Fungsi untuk mengupdate total keseluruhan
            function updateCartTotal() {
                let total = 0;
                document.querySelectorAll('.quantity-input').forEach(input => {
                    const row = input.closest('tr');
                    const harga = parseFloat(row.dataset.harga);
                    const jumlah = parseInt(input.value);
                    total += harga * jumlah;
                });
                document.getElementById('cart-subtotal').textContent = formatRupiah(total);
                document.getElementById('cart-total').textContent = formatRupiah(total);
            }

            // Event listener untuk setiap input jumlah
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('input', function () {
                    const id = this.dataset.id;
                    const jumlah = parseInt(this.value);
                    const row = this.closest('tr');
                    const harga = parseFloat(row.dataset.harga);

                    // 1. Update subtotal per item di tampilan
                    const subtotalElement = row.querySelector('.item-subtotal');
                    subtotalElement.textContent = formatRupiah(harga * jumlah);

                    // 2. Update total keseluruhan di tampilan
                    updateCartTotal();

                    // 3. Kirim perubahan ke server (update session)
                    fetch("{{ route('keranjang.update') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ id: id, jumlah: jumlah })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update badge notifikasi di navbar
                                const cartBadge = document.getElementById('cart-badge-count');
                                if (cartBadge) {
                                    cartBadge.textContent = data.totalItems;
                                }
                            }
                        })
                        .catch(err => console.error(err));
                });
            });

            // Script untuk tombol "Beli Sekarang" (sudah ada sebelumnya)
            document.getElementById('bayarSekarang')?.addEventListener('click', function () {
                // ... (logika fetch ke payment.pay tidak perlu diubah)
                // Pastikan logika ini tetap ada jika Anda membutuhkannya
                fetch("{{ route('payment.pay') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ /* data pembayaran jika ada */ })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.snap_token) {
                            snap.pay(data.snap_token, {
                                onSuccess: function () { window.location.href = "{{ route('payment.success') }}"; },
                                onPending: function () { window.location.href = "{{ route('payment.success') }}"; },
                                onError: function () { console.error("Pembayaran gagal."); },
                                onClose: function () { console.warn("Popup ditutup."); }
                            });
                        }
                    });
            });
        });
    </script>
@endpush

{{-- PERUBAHAN 7: Tambahkan push 'styles' jika belum ada --}}
@push('styles')
    <style>
        /* CSS untuk tabel responsif (sudah ada sebelumnya, tidak perlu diubah) */
        @media (max-width: 767.98px) {
            .table-responsive-stack thead {
                display: none;
            }

            .table-responsive-stack tr {
                display: block;
                margin-bottom: 1.5rem;
                border: 1px solid #dee2e6;
                border-radius: .375rem;
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
            }

            .table-responsive-stack td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: .75rem 1rem !important;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table-responsive-stack tr td:last-child {
                border-bottom: none;
            }

            .table-responsive-stack td::before {
                content: attr(data-label);
                font-weight: 600;
                margin-right: auto;
                text-align: left;
            }

            .table-responsive-stack td[data-label="Gambar"],
            .table-responsive-stack td[data-label="Aksi"] {
                justify-content: center;
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .table-responsive-stack td[data-label="Gambar"]::before,
            .table-responsive-stack td[data-label="Aksi"]::before {
                display: none;
            }

            .quantity-input {
                width: 80px !important;
                margin-left: auto;
            }
        }
    </style>
@endpush