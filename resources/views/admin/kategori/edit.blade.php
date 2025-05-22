@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-dark text-muted">Edit Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/kategori" class="text-info">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-edit me-1"></i> Edit Kategori Produk
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="kategori"
                                value="{{ $kategori->kategori }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi"
                                rows="3">{{ $kategori->deskripsi }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-warning">
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
