@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.ulasan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Ulasan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-success text-dark">
                <i class="fas fa-edit me-1"></i> Edit Ulasan Produk
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ulasan.update', $ulasan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="produk_id" class="form-label">Produk</label>
                        <select name="produk_id" id="produk_id" class="form-select" required>
                            <option value="" disabled>Pilih Produk</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}" {{ $ulasan->produk_id == $produk->id ? 'selected' : '' }}>
                                    {{ $produk->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Nama Pemesan</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="" disabled>Pilih Pemesan</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $ulasan->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" name="rating" class="form-control" id="rating" min="1" max="5" value="{{ $ulasan->rating }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="ulasan" class="form-label">Ulasan</label>
                        <textarea name="ulasan" class="form-control" id="ulasan" rows="3" required>{{ $ulasan->ulasan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
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
