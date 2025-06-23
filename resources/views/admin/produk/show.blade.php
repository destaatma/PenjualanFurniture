@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 bg-light p-3 rounded text-muted text-center">Detail Produk</h1>
            <ol class="breadcrumb mb-4"></ol>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white d-flex align-items-center"> {{-- Ubah text-light
                            menjadi text-white --}}
                            <i class="fas fa-box-open me-2 fs-4"></i>
                            <h5 class="fw-bold mb-0">{{ $produk->nama }}</h5>
                        </div>
                        <div class="card-body">
                            @if ($produk->gambar)
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded"
                                        alt="Gambar {{ $produk->nama }}" style="max-width: 300px; height: auto;"> {{-- Tambah
                                    height: auto --}}
                                </div>
                            @else
                                <div class="text-center mb-4 text-muted">
                                    <p>Tidak ada gambar produk.</p>
                                </div>
                            @endif

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Kategori:</strong> {{ $produk->kategori->nama }} {{-- Gunakan
                                    $produk->kategori->nama, bukan $produk->kategori->kategori --}}
                                </li>
                                <li class="list-group-item">
                                    <strong>Deskripsi:</strong> {{ $produk->deskripsi ?: '-' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Harga:</strong> Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                </li>
                                {{-- Menampilkan Status Stok --}}
                                <li class="list-group-item">
                                    <strong>Stok:</strong>
                                    @if ($produk->stok == 'ready')
                                        <span class="badge bg-success">{{ ucfirst($produk->stok) }}</span>
                                    @elseif ($produk->stok == 'preorder')
                                        <span class="badge bg-info">{{ ucfirst($produk->stok) }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($produk->stok) }}</span>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    <strong>Dibuat Pada:</strong> {{ $produk->created_at->format('d M Y, H:i') }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Terakhir Diperbarui:</strong> {{ $produk->updated_at->format('d M Y, H:i') }}
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection