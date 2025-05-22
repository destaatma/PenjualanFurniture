@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 bg-light p-3 rounded text-muted text-center">Detail Produk</h1>
            <ol class="breadcrumb mb-4"></ol>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-header bg-info text-light">
                            <h5 class="fw-bold mt-2">
                                <i class="fas fa-box-open me-2"></i> {{ $produk->nama }}
                            </h5>
                        </div>
                        <div class="card-body">
                            @if ($produk->gambar)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded"
                                        alt="Gambar {{ $produk->nama }}" width="300">
                                </div>
                            @endif

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Kategori:</strong> {{ $produk->kategori->kategori }}
                                </li>
                                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</li>
                                <li class="list-group-item"><strong>Harga:</strong>
                                    Rp{{ number_format($produk->harga, 0, ',', '.') }}</li>
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <a href="/admin/produk" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
