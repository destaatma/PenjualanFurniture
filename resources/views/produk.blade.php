@extends('layouts.user.main')
@section('content')

    <!-- Start Produk Section -->
    <div class="produk">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="mb-5 mt-4 fw-bold text-uppercase text-muted"
                        style="font-size: 3rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Koleksi Produk Rumah Mebel
                    </h1>
                    <p class="mb-5 text-secondary fs-5" style="font-size: 1.25rem;">
                        RUMAH Mebel – Sentuhan Elegan untuk Rumah Anda! ✨ Hadirkan kenyamanan dan gaya dengan furnitur
                        berkualitas tinggi yang dirancang khusus untuk Anda.
                    </p>
                </div>
            </div>

            <form method="GET" action="{{ url('/produk') }}">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="row text-center">
                            @foreach ($kategoris as $k)
                                <div class="col-md-3 col-sm-4 col-6 mb-2">
                                    <button type="submit" name="kategori_id" value="{{ $k->id }}"
                                        class="btn btn-light btn-sm w-100 filter-btn">
                                        {{ $k->kategori }}
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>

            <hr class="custom-divider">

            <!-- Daftar Produk -->
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-lg-3 col-md-4 mb-4 produk-item {{ $produk->kategori->kategori }}">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <a href="{{ route('produk.show', $produk->id) }}">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid mb-3 rounded"
                                        style="width: 100%; max-width: 250px; height: auto;">
                                </a>
                                <h4 class="fw-bold">{{ $produk->nama }}</h4>
                                <p class="text-muted">{{ $produk->deskripsi }}</p>
                                <p class="fw-bold text-primary text-center" style="font-size: 1rem;">Rp
                                    {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                                <div class="d-flex justify-content-center">
                                    {{-- <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="fas fa-shopping-cart btn btn-primary mb-1"> Beli
                                            Sekarang</button>
                                    </form> --}}
                                    <div class="d-flex justify-content-center" style="margin-top: ;">
                                        <a href="/checkout" class="btn btn-secondary">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <style>
        .product {
            border: 1px solid #e0e0e0;
            margin: 10px;
            padding: 10px;
            text-align: center;
        }

        .product-image {
            width: 100%;
            height: auto;
            /* Menjaga aspect ratio */
        }

        .custom-divider {
            border: none;
            height: 3px;
            background: linear-gradient(to right, #ddd, #666, #ddd);
            margin: 50px 0;
        }
    </style>

@endsection
