@extends('layouts.user.main')

@section('content')
    {{-- External Stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <div class="container mt-5">
        {{-- ========================== --}}
        {{-- INFORMASI PRODUK --}}
        {{-- ========================== --}}
        <div class="row mb-5 g-4 align-items-start">
            {{-- Product Image Column --}}
            <div class="col-12 col-lg-6">
                <div class="border rounded shadow-sm p-2 bg-white">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}"
                        class="img-fluid rounded w-100 zoomable"
                        style="aspect-ratio: 4/3; object-fit: contain; background-color: #f8f9fa;">
                </div>
            </div>


            {{-- Product Details Column --}}
            <div class="col-12 col-lg-6">
                <h2 class="fw-bold">{{ $produk->nama }}</h2>
                <p class="fs-4 text-primary fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p><strong>SKU:</strong> RM-ID {{ $produk->id }}</p>
                <p><strong>Stok Produk:</strong> {{ $produk->stok }}</p>
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
                        <ul class="list-unstyled"> {{-- Added list-unstyled for basic ul without default styling --}}
                            @foreach (explode(';', $produk->spesifikasi) as $item)
                                <li>{{ trim($item) }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="mb-4">
                    {{-- Button Group for Keranjang and Beli Sekarang --}}
                    {{-- Using d-grid for stacking on mobile, d-lg-flex for side-by-side on large --}}
                    <div class="d-grid gap-2 d-lg-flex align-items-stretch mb-3">
                        <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST" class="flex-fill">
                            @csrf
                            <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-cart-plus-fill me-2"></i> Keranjang
                            </button>
                        </form>

                        <form action="{{ route('bayar-langsung') }}" method="POST" class="flex-fill">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                            <button type="submit" class="btn btn-primary w-100">Beli Sekarang</button>
                        </form>
                    </div>

                    @php
                        $nomorWhatsApp = '6287860352236';
                        $pesanWhatsApp = "Halo, saya tertarik dengan produk: " . $produk->nama . " (SKU: RM-ID " . $produk->id . "). Mohon informasinya.";
                        $urlWhatsApp = "https://wa.me/" . $nomorWhatsApp . "?text=" . rawurlencode($pesanWhatsApp);
                    @endphp
                    <a href="{{ $urlWhatsApp }}" target="_blank" class="btn btn-lg w-100 text-white"
                        style="background-color: #126d35; border-color: #126d35;">
                        <i class="bi bi-whatsapp me-2"></i> Pesan via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <hr class="col-lg-6">
        </hr>

        {{-- KOLOM KIRI: DAFTAR ULASAN PRODUK --}}
        <div class="col-12 col-lg-6">
            {{-- DIV PEMBUNGKUS BARU DENGAN BORDER DITAMBAHKAN DI SINI --}}
            <div class="border rounded-3 p-4">

                <div class="mb-5">
                    @php
                        $publishedUlasans = $produk->ulasans->where('status', 'published')->sortByDesc('created_at');
                        $rataRataRating = $publishedUlasans->avg('rating');
                        $jumlahUlasan = $publishedUlasans->count();

                        // Hanya hitung detail pemesanan jika pemesanan statusnya 'selesai'
                        $totalTerjual = $produk->detailPemesanans()
                            ->whereHas('pemesanan', function ($query) {
                                $query->where('status_pemesanan', 'selesai');
                            })
                            ->sum('jumlah_produk');

                        // --- LOGIKA BARU UNTUK FORMAT JUMLAH ULASAN ---
                        $formattedJumlahUlasan = '';
                        if ($jumlahUlasan < 1000) {
                            $formattedJumlahUlasan = number_format($jumlahUlasan);
                        } else {
                            // Bagi dengan 1000, format 1 angka desimal, ganti titik dengan koma
                            $formattedJumlahUlasan = str_replace('.', ',', number_format($jumlahUlasan / 1000, 1)) . ' rb';
                        }
                    @endphp
                    <div class="d-flex align-items-center" style="font-size: 1rem;">
                        {{-- Ikon Bintang --}}
                        <i class="bi bi-star-fill text-warning me-1"></i>

                        {{-- Rating Rata-rata --}}
                        <span class="fw-bold">{{ number_format($rataRataRating, 1) }}</span>

                        {{-- Jumlah Ulasan yang sudah diformat --}}
                        <span class="text-muted ms-1">({{ $formattedJumlahUlasan }})</span>

                        {{-- Total Terjual --}}
                        <span class="text-muted">{{ number_format($totalTerjual, 0, ',', '.') }} terjual</span>
                    </div>
                </div>

                <h3 class="fw-bold mb-4">Ulasan Produk ({{ $publishedUlasans->count() }})</h3>

                @if ($publishedUlasans->count() > 0)
                    @foreach ($publishedUlasans as $index => $ulasan)
                        <div class="d-flex mb-4 ulasan-item {{ $index > 1 ? 'd-none extra-ulasan' : '' }}">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr($ulasan->user->name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex justify-content-between align-items-center flex-grow-1">
                                        <div>
                                            <span class="fw-bold">{{ $ulasan->user->name }}</span>
                                            <span class="text-muted small ms-2">{{ $ulasan->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="text-warning mb-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bi {{ $i <= $ulasan->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="mb-1">{{ $ulasan->ulasan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($publishedUlasans->count() > 2)
                        <div class="mt-3">
                            <button class="btn btn-outline-primary btn-sm" id="toggleUlasan">Tampilkan semua ulasan</button>
                        </div>
                    @endif
                @else
                    <p class="text-muted">Belum ada ulasan untuk produk ini.</p>
                @endif

            </div> {{-- AKHIR DARI DIV PEMBUNGKUS BARU --}}
        </div>

        {{-- ========================== --}}
        {{-- FORM ULASAN PRODUK --}}
        {{-- ========================== --}}
        <div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <div class="border rounded-3 p-4">
                    <h3 class="fw-bold mb-4">Tulis Ulasan Anda</h3>

                    {{-- Tampilkan notifikasi berhasil atau error --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @auth
                        <form action="{{ route('ulasans.store') }}" method="POST" class="mb-4 border border-1 rounded-3 p-4">
                            @csrf {{-- CSRF token is here --}}
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                            <div class="mb-3">
                                <label class="form-label d-block fw-bold">Beri Rating</label>
                                <div class="star-rating">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star-{{ $i }}" name="rating" value="{{ $i }}" required {{ old('rating') == $i ? 'checked' : '' }}>
                                        <label for="star-{{ $i }}" class="star">&#9733;</label>
                                    @endfor
                                </div>
                                @error('rating')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ulasan" class="form-label fw-bold">Ulasan Anda</label>
                                <textarea name="ulasan" id="ulasan" class="form-control @error('ulasan') is-invalid @enderror"
                                    rows="4" placeholder="Bagaimana pendapat Anda tentang produk ini?"
                                    required>{{ old('ulasan') }}</textarea>
                                {{-- @error('ulasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror --}}
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                        </form>
                    @else
                        <div class="alert alert-secondary text-center" role="alert">
                            Silakan <a href="{{ route('login') }}" class="alert-link">login</a> untuk menulis ulasan.
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- Script to show/hide reviews --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggleUlasan');
            if (toggleBtn) { // Check if the button exists before adding event listener
                let showAll = false;
                toggleBtn.addEventListener('click', function () {
                    const extraUlasans = document.querySelectorAll('.extra-ulasan');
                    showAll = !showAll;

                    extraUlasans.forEach(el => {
                        el.classList.toggle('d-none', !showAll);
                    });

                    toggleBtn.textContent = showAll ? 'Tutup ulasan' : 'Tampilkan semua ulasan';
                });
            }

            // Star Rating JavaScript for active state (optional, but good for UX)
            const stars = document.querySelectorAll('.star-rating input');
            stars.forEach(star => {
                star.addEventListener('change', () => {
                    // Update the visual state of stars based on the selected input
                    const rating = star.value;
                    const labels = star.closest('.star-rating').querySelectorAll('label');
                    labels.forEach(label => {
                        if (parseInt(label.getAttribute('for').replace('star-', '')) <= rating) {
                            label.style.color = '#ffc107'; // Active star color
                        } else {
                            label.style.color = '#d3d3d3'; // Inactive star color
                        }
                    });
                });
            });

            // Set initial state for stars if old('rating') exists (for validation errors)
            const initialRating = document.querySelector('.star-rating input:checked');
            if (initialRating) {
                const event = new Event('change');
                initialRating.dispatchEvent(event);
            }
        });
    </script>

    {{-- Additional Styles --}}
    <style>
        .zoomable {
            transition: transform 0.3s ease;
        }

        .zoomable:hover {
            transform: scale(1.05);
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            /* Keeps stars right-aligned */
            justify-content: flex-end;
            /* Aligns stars to the right */
            font-size: 2.5rem;
            /* Larger stars */
            color: #d3d3d3;
            /* Default gray color */
            cursor: pointer;
            /* Optional: Add a subtle margin between stars */
            gap: 0.1rem;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            transition: color 0.2s ease-in-out;
            font-size: 2rem;
            /* Adjusted for better appearance with padding */
            padding: 0 0.15rem;
            /* Space between star characters */
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
            /* Hover color */
        }

        .star-rating input:checked~label {
            color: #ffc107;
            /* Selected color */
        }

        /* Responsive adjustments for star rating on smaller screens */
        @media (max-width: 575.98px) {

            /* For extra small devices (phones) */
            .star-rating {
                font-size: 2rem;
                /* Slightly smaller stars on tiny screens */
            }

            .star-rating label {
                font-size: 1.8rem;
            }
        }
    </style>
@endsection