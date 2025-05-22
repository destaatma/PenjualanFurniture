@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-muted">Tambah Ulasan</h1>
        <ol class="breadcrumb mb-4 bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ route('admin.ulasan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Ulasan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <i class="fas fa-chart-area me-1"></i> Tambah Ulasan Produk
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ulasan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="produk_id" class="form-label">Produk</label>
                        <select name="produk_id" id="produk_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Produk</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Nama Pemesan</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Pemesan</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" name="rating" class="form-control" id="rating" min="1" max="5" required>
                    </div>

                    <div class="mb-3">
                        <label for="ulasan" class="form-label">Ulasan</label>
                        <textarea name="ulasan" class="form-control" id="ulasan" rows="3" placeholder="Tambahkan ulasan tentang produk"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
