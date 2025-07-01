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
                    {{-- 2. Tambahkan class 'table-responsive-stack' --}}
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
                                <tr>
                                    {{-- 3. Tambahkan atribut data-label di setiap <td> --}}
                                    <td data-label="Gambar" class="text-center">
                                        <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" width="80"
                                            class="img-thumbnail">
                                    </td>
                                    <td data-label="Nama Produk">{{ $item['nama'] }}</td>
                                    <td data-label="Harga Satuan">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                    <td data-label="Jumlah">
                                        <input type="number" name="jumlah" class="form-control text-center quantity-input"
                                            data-id="{{ $id }}" min="1" value="{{ $item['jumlah'] }}">
                                    </td>
                                    <td data-label="Subtotal">Rp {{ number_format($sub, 0, ',', '.') }}</td>
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
                {{-- 4. Tambahkan 'col-12' untuk mobile-first --}}
                <div class="col-12 col-md-6 col-lg-4 border p-4 rounded bg-light">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">Subtotal:</h5>
                        <p class="fw-bold fs-5">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">Total Keseluruhan:</h5>
                        <p class="text-primary fw-bold fs-5">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
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
    {{-- Script tidak perlu diubah, sudah bagus --}}
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
{{-- 1. Tambahkan push 'styles' untuk CSS khusus halaman ini --}}
@push('styles')
    <style>
        /* CSS untuk membuat tabel menjadi responsif (Card View on Mobile) */
        @media (max-width: 767.98px) {
            .table-responsive-stack thead {
                display: none;
                /* Sembunyikan header tabel di mobile */
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
                /* Membuat label dan nilai berseberangan */
                align-items: center;
                padding: .75rem 1rem !important;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table-responsive-stack tr td:last-child {
                border-bottom: none;
                /* Hapus border untuk item terakhir di card */
            }

            .table-responsive-stack td::before {
                content: attr(data-label);
                /* Ambil teks label dari atribut data-label */
                font-weight: 600;
                margin-right: auto;
                /* Dorong nilai ke kanan */
                text-align: left;
            }

            /* Penyesuaian khusus untuk kolom gambar dan aksi */
            .table-responsive-stack td[data-label="Gambar"],
            .table-responsive-stack td[data-label="Aksi"] {
                justify-content: center;
                /* Pusatkan konten gambar dan tombol */
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .table-responsive-stack td[data-label="Gambar"]::before,
            .table-responsive-stack td[data-label="Aksi"]::before {
                display: none;
                /* Sembunyikan label untuk gambar dan aksi */
            }

            /* Penyesuaian untuk input jumlah */
            .quantity-input {
                width: 80px !important;
                margin-left: auto;
                /* Dorong input ke kanan */
            }
        }
    </style>
@endpush
