@extends('layouts.user.main')

@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-lg-6">
                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded" alt="{{ $produk->nama }}">
            </div>
            <div class="col-lg-6">
                <h1 class="font-weight-bold">{{ $produk->nama }}</h1>
                <p>{{ $produk->deskripsi }}</p>
                <p class="fw-bold text-primary">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
        <hr>

        <h2>Ulasan Produk</h2>
        <div class="row">
            <div class="col-lg-12">
                @if ($ulasans && count($ulasans) > 0)
                    @foreach ($ulasans as $ulasan)
                        <div class="testimonial-block mb-4 p-3 border rounded">
                            <blockquote class="mb-2">
                                <p>&ldquo;{{ $ulasan->ulasan }}&rdquo;</p>
                            </blockquote>
                            <div class="author-info mt-2">
                                <h5>{{ $ulasan->user->name }}</h5>
                                <span class="position d-block mb-3">Rating: {{ $ulasan->rating }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Tidak ada ulasan untuk produk ini.</p>
                @endif
            </div>
        </div>

        <h3>Tambah Ulasan</h3>
        <form action="{{ route('ulasans.store') }}" method="POST" class="bg-light p-4 rounded">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="">Pilih Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ulasan" class="form-label">Ulasan</label>
                <textarea name="ulasan" id="ulasan" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
        </form>
    </div>
@endsection