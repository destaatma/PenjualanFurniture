@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Edit Produk</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.produk.index') }}" class="text-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Produk</li>
            </ol>

            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-dark">
                    <i class="fas fa-edit me-1"></i> Edit Produk
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-select" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->id }}" {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                                            {{ $k->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $produk->nama }}"
                                    required>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                    required>{{ $produk->deskripsi }}</textarea>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $produk->harga }}" required>
                            </div>

                            <div class="mb-3 col-12">
                                <label for="gambar" class="form-label">Gambar Produk</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-thumbnail mt-2" width="120">
                                @endif
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
