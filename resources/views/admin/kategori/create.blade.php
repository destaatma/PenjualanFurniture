@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/kategori">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-list-alt me-1"></i> Tambah Kategori Produk
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Masukkan nama kategori" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Tambahkan deskripsi (Opsional)"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
