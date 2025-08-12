@extends('layouts.user.main')

@section('content')
    <div class="produk py-5">
        <div class="container">

            <!-- Heading -->
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="mb-4 fw-bold text-uppercase">Koleksi Produk OMAH Mebel</h1>
                    <p class="mb-4 text-secondary fs-5">
                        OMAH Mebel – Sentuhan Elegan untuk Rumah Anda! ✨ Hadirkan kenyamanan dan gaya dengan furnitur
                        berkualitas tinggi yang dirancang khusus untuk Anda.
                    </p>
                </div>
            </div>

            <!-- Toggle kategori (mobile only) -->
            <div class="d-flex justify-content-between align-items-center mb-3 d-md-none">
                <button class="btn btn-success w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#kategoriCollapse" aria-expanded="false" aria-controls="kategoriCollapse">
                    KATEGORI <i class="bi bi-chevron-down ms-1"></i>
                </button>
            </div>

            <!-- Filter Kategori -->
            <div class="collapse d-md-block" id="kategoriCollapse">
                <form method="GET" action="{{ url('/produk') }}">
                    <div class="row mb-4 gx-2 gy-2 justify-content-center">
                        @foreach ($kategoris as $k)
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <button type="submit" name="kategori_id" value="{{ $k->id }}"
                                    class="btn {{ request()->get('kategori_id') == $k->id ? 'btn-success' : 'btn-outline-secondary' }} w-100 text-truncate">
                                    {{ $k->kategori }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>

            <hr class="custom-divider">

            <div class="row g-4">
                @forelse ($produks as $produk)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <!-- Gambar -->
                            <a href="{{ route('produk.show', $produk->id) }}"
                                class="d-block overflow-hidden rounded-top bg-white text-center" style="height: 220px;">
                                <img src="{{ asset('storage/' . $produk->gambar) }}" class="h-100"
                                    style="max-width: 100%; object-fit: contain;" alt="{{ $produk->nama }}">
                            </a>
                            <!-- Konten -->
                            <div class="p-3">
                                <h6 class="fw-semibold mb-2">
                                    <a href="{{ route('produk.show', $produk->id) }}" class="text-decoration-none text-dark">
                                        {{ $produk->nama }}
                                    </a>
                                </h6>
                                <p class="mb-0 text-primary fw-semibold">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                                <p class="text-muted small mt-1 mb-0">
                                    <strong>Stok Produk:</strong> {{ $produk->stok }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Tidak ada produk ditemukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .custom-divider {
            border: none;
            height: 3px;
            background: linear-gradient(to right, #ddd, #666, #ddd);
            margin: 50px 0;
        }

        .card img {
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.03);
        }

        .product-image {
            object-fit: cover;
            height: 200px;
            width: 100%;
            max-width: 240px;
        }

        @media (max-width: 576px) {
            .product-image {
                height: 160px;
            }
        }
    </style>
@endsection