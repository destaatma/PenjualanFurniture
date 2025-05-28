@extends('layouts.user.main')

@section('content')
    <!-- Start Produk Section -->
    <div class="produk py-5">
        <div class="container">

            <!-- Heading -->
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="mb-4 fw-bold text-uppercase">Koleksi Produk Rumah Mebel</h1>
                    <p class="mb-4 text-secondary fs-5">
                        RUMAH Mebel – Sentuhan Elegan untuk Rumah Anda! ✨ Hadirkan kenyamanan dan gaya dengan furnitur
                        berkualitas tinggi yang dirancang khusus untuk Anda.
                    </p>
                </div>
            </div>

            <!-- Filter Kategori -->
            <form method="GET" action="{{ url('/produk') }}">
                <div class="row mb-4 justify-content-center">
                    @foreach ($kategoris as $k)
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <button type="submit" name="kategori_id" value="{{ $k->id }}"
                                class="btn btn-light btn-sm w-100 filter-btn">
                                {{ $k->kategori }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </form>

            <hr class="custom-divider">

            <!-- Daftar Produk -->
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 produk-item {{ $produk->kategori->kategori }}">
                        <div class="position-relative bg-white shadow-sm rounded p-3 text-center h-100">

                            <!-- Gambar Produk -->
                            <a href="{{ route('produk.show', $produk->id) }}" class="d-block mb-3">
                                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded"
                                    alt="{{ $produk->nama }}"
                                    style="width: 100%; height: 200px; object-fit: cover; max-width: 220px;">
                            </a>

                            <!-- Nama Produk -->
                            <h3 class="product-title fw-bold mt-2 mb-2" style="font-size: 1.1rem; color: #333;">
                                {{ $produk->nama }}
                            </h3>

                            <!-- Harga Produk -->
                            <p class="fw-bold text-primary mb-0" style="font-size: 1rem;">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
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
    </style>
@endsection