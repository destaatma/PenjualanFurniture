@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Edit Ulasan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="/admin/ulasan" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Ulasan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-edit me-1"></i> Form Edit Ulasan
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ulasan.update', $ulasan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="produk_id" class="form-label">Produk</label>
                            <select class="form-control" id="produk_id" name="produk_id" required>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" {{ $ulasan->produk_id == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('produk_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pelanggan</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $ulasan->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating"
                                value="{{ old('rating', $ulasan->rating) }}" min="1" max="5" required>
                            @error('rating')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ulasan" class="form-label">Ulasan</label>
                            <textarea class="form-control" id="ulasan" name="ulasan"
                                rows="3">{{ old('ulasan', $ulasan->ulasan) }}</textarea>
                            @error('ulasan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}" {{ $ulasan->status == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Ulasan</button>
                        <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection