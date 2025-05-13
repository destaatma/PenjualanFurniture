@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.produk.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
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
                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama produk" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Tambahkan deskripsi produk"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga produk" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                    </button>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
