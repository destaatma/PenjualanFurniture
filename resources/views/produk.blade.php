@extends('layouts.user.main')

@section('content')
    <!-- Start Produk Section -->
    <div class="produk py-5">
        <div class="container">

            <!-- Heading -->
            <div class="row text-center">
                <div class="col-12">
                    {{-- Breadcrumb navigation to improve user experience --}}
                    <h1 class="mb-4 fw-bold text-uppercase">Koleksi Produk Rumah Mebel</h1>
                    <p class="mb-4 text-secondary fs-5">
                        RUMAH Mebel – Sentuhan Elegan untuk Rumah Anda! ✨ Hadirkan kenyamanan dan gaya dengan furnitur
                        berkualitas tinggi yang dirancang khusus untuk Anda.
                    </p>
                </div>
            </div>

            <!-- Filter Kategori -->
            <form method="GET" action="{{ url('/produk') }}">
                <div class="row mb-4 justify-content-center gx-2 gy-2">
                    @foreach ($kategoris as $k)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <button type="submit" name="kategori_id" value="{{ $k->id }}"
                                class="btn btn-outline-secondary w-100 text-truncate">
                                {{ $k->kategori }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </form>

            <hr class="custom-divider">

            <!-- Daftar Produk -->
            <div class="row g-4">
                @forelse ($produks as $produk)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="card h-100 shadow-sm border-0 product-card text-center d-flex flex-column p-3">

                            <!-- Gambar Produk -->
                            <a href="{{ route('produk.show', $produk->id) }}" class="d-block mb-3">
                                <img src="{{ asset('storage/' . $produk->gambar) }}"
                                    class="card-img-top img-fluid rounded product-image mx-auto" alt="{{ $produk->nama }}">
                            </a>

                            <!-- Nama Produk -->
                            <h3 class="fw-bold mb-2 text-dark fs-6 flex-grow-1">
                                {{ $produk->nama }}
                            </h3>

                            <!-- Harga Produk -->
                            <p class="fw-bold text-primary fs-6 mb-0">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>
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

    <!-- Custom Styles -->
    <style>
        .custom-divider {
            border: none;
            height: 3px;
            background: linear-gradient(to right, #ddd, #666, #ddd);
            margin: 50px 0;
        }

        /* Efek hover transisi seperti produk rekomendasi */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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

            .produk .product-title {
                font-size: 0.95rem;
            }
        }
    </style>
@endsection
