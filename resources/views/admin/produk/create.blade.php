@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Tambah Produk</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.produk.index') }}" class="text-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>

            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-box-open me-1"></i> Tambah Produk
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($kategoris as $k)
                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama produk"
                                value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                placeholder="Tambahkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control"
                                placeholder="Masukkan harga produk" value="{{ old('harga') }}" required min="0">
                            @error('harga')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input untuk Status Stok (Ready/Preorder) --}}
                        <div class="mb-3">
                            <label for="stok" class="form-label">Status Stok</label>
                            <select class="form-control" id="stok" name="stok" required>
                                <option value="" disabled selected>Pilih Status Stok</option>
                                @foreach($stokOptions as $option) {{-- Variabel $stokOptions dari controller --}}
                                    <option value="{{ $option }}" {{ old('stok') == $option ? 'selected' : '' }}>
                                        {{ ucfirst($option) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('stok')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                            @error('gambar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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