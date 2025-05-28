@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 bg-light p-3 rounded text-muted text-center">Detail Produk</h1>
            <ol class="breadcrumb mb-4"></ol>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-header bg-info text-light d-flex align-items-center">
                            <i class="fas fa-box-open me-2 fs-4"></i>
                            <h5 class="fw-bold mb-0">{{ $produk->nama }}</h5>
                        </div>
                        <div class="card-body">
                            @if ($produk->gambar)
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded"
                                        alt="Gambar {{ $produk->nama }}" style="max-width: 300px;">
                                </div>
                            @endif

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Kategori:</strong> {{ $produk->kategori->kategori }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Deskripsi:</strong> {{ $produk->deskripsi ?: '-' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Harga:</strong> Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection