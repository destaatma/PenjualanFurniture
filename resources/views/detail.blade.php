@extends('layouts.user.main')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <div class="container mt-5">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/produk">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
            </ol>
        </nav>
        {{-- =================================== --}}
        {{-- BARIS UTAMA: INFORMASI PRODUK --}}
        {{-- =================================== --}}
        <div class="row mb-5 g-4 align-items-start">
            <div class="col-lg-6">
                <div class="border rounded shadow-sm p-2 bg-white">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}"
                        class="img-fluid rounded w-100 zoomable"
                        style="aspect-ratio: 4/3; object-fit: contain; background-color: #f8f9fa;">
                </div>
            </div>

            <div class="col-lg-6">
                <h2 class="fw-bold">{{ $produk->nama }}</h2>
                <p class="fs-4 text-primary fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p><strong>SKU:</strong> RM-ID {{ $produk->id }}</p>
                <div class="d-flex align-items-start mb-4">
                    <div>
                        <strong>Gratis Pengiriman</strong><br>
                        <small class="text-muted">Seluruh Pulau Jawa – Min. belanja IDR 5.000.000</small>
                    </div>
                </div>
                <div>
                    <h4 class="fw-bold mb-3">Deskripsi Produk</h4>
                    <hr>
                    <p>{{ $produk->deskripsi }}</p>

                    @if($produk->spesifikasi)
                        <h5 class="fw-bold mt-4">Spesifikasi Produk:</h5>
                        <ul>
                            @foreach (explode(';', $produk->spesifikasi) as $item)
                                <li>{{ trim($item) }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-stretch mb-3">
                        <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST" class="d-flex">
                            @csrf
                            <button type="submit"
                                class="btn btn-primary flex-grow-1 d-inline-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-plus-fill fs-5 me-2"></i>
                                <span>Keranjang</span>
                            </button>
                        </form>
                        <form action="{{ route('bayar-langsung') }}" method="POST" class="ms-2 flex-grow-1">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            <button type="submit" class="btn btn-primary w-50 h-100">Beli Sekarang</button>
                        </form>
                    </div>

                    @php
                        $nomorWhatsApp = '6287860352236';
                        $pesanWhatsApp = "Halo, saya tertarik dengan produk: " . $produk->nama . " (SKU: RM-ID " . $produk->id . "). Mohon informasinya.";
                        $urlWhatsApp = "https://wa.me/" . $nomorWhatsApp . "?text=" . rawurlencode($pesanWhatsApp);
                    @endphp

                    <a href="{{ $urlWhatsApp }}" target="_blank" class="btn btn-lg w-50 text-white"
                        style="background-color: #126d35; border-color: #126d35;">
                        <i class="bi bi-whatsapp me-2"></i> Pesan via WhatsApp
                    </a>
                </div>
            </div>
        </div>
        {{-- AKHIR DARI BARIS INFORMASI PRODUK --}}

        @if ($produk->ulasans->count() > 0)
            <div class="row">
                <div class="col-6 ">
                    <h5 class="mb-3">Ulasan ({{ $produk->ulasans->count() }})</h5>

                    @foreach ($produk->ulasans as $index => $ulasan)
                        <div class="d-flex mb-4 ulasan-item {{ $index > 1 ? 'd-none extra-ulasan' : '' }}">
                            <!-- Avatar -->
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr($ulasan->user->name, 0, 1)) }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $ulasan->user->name }}</strong>
                                        <span class="text-muted small ms-2">{{ $ulasan->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="text-warning">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bi {{ $i <= $ulasan->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                        @endfor
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <p class="mb-1">{{ $ulasan->ulasan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($produk->ulasans->count() > 2)
                        <div class="text-center">
                            <button class="btn btn-outline-primary btn-sm" id="toggleUlasan">Tampilkan semua ulasan</button>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <p class="text-muted">Belum ada ulasan untuk produk ini.</p>
        @endif


        {{-- =================================== --}}
        {{-- BARIS BARU: BAGIAN ULASAN PRODUK --}}
        {{-- =================================== --}}
        <div class="row mt-4">
            <div class="col-6">
                <hr>
                <h3 class="fw-bold mb-4">Ulasan Produk</h3>
                {{-- Form Ulasan dipindahkan ke sini --}}
                @if(auth()->check())
                    <form action="{{ route('ulasans.store') }}" method="POST"
                        class="mb-4 border border-1 rounded-2 p-3 bg-white">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                        <div class="mb-3">
                            <label class="form-label d-block">Beri Rating</label>
                            <div class="star-rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star-{{ $i }}" name="rating" value="{{ $i }}" required>
                                    <label for="star-{{ $i }}" class="star">&#9733;</label>
                                @endfor
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ulasan" class="form-label">Ulasan Anda</label>
                            <textarea name="ulasan" rows="" class="form-control"
                                placeholder="Bagaimana pendapat Anda tentang produk ini?" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                    </form>
                @else
                    <div class="alert alert-secondary text-center" role="alert">
                        Silakan <a href="{{ route('login') }}" class="alert-link">login</a> untuk menulis ulasan.
                    </div>
                @endif
                {{-- AKHIR DARI BARIS ULASAN PRODUK --}}
            </div>
        </div>
    </div>


    {{-- Script untuk tombol tampilkan/tutup ulasan --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggleUlasan');
            let showAll = false;

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    const extraUlasans = document.querySelectorAll('.extra-ulasan');

                    showAll = !showAll;
                    extraUlasans.forEach(el => {
                        el.classList.toggle('d-none', !showAll);
                    });

                    toggleBtn.textContent = showAll ? 'Tutup ulasan' : 'Tampilkan semua ulasan';
                });
            }
        });
    </script>
    <style>
        .zoomable:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Styling untuk Rating Bintang Interaktif */
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            font-size: 2.5rem;
            color: #d3d3d3;
            cursor: pointer;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            transition: color 0.2s;
        }

        .star-rating:not(:hover) label:hover,
        .star-rating:not(:hover) label:hover~label,
        .star-rating:hover label,
        .star-rating input:checked~label {
            color: #ffc107;
        }

        .star-rating .star {
            font-size: 1.5rem;
            color: #ccc;
            cursor: pointer;
        }

        .star-rating input:checked~label.star,
        .star-rating input:checked+label.star {
            color: gold;
        }
    </style>
@endsection