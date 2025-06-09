@extends('layouts.user.main')

@section('content')
    <div class="container mt-5">
        <div class="row mb-5 g-4 align-items-start">

            <!-- Gambar Produk -->
            <div class="col-lg-6">
                <div class="border rounded shadow-sm p-2 bg-white">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}"
                        class="img-fluid rounded w-100 zoomable"
                        style="aspect-ratio: 4/3; object-fit: contain; background-color: #f8f9fa;">
                </div>
            </div>

            <!-- Detail Produk -->
            <div class="col-lg-6">
                <h2 class="fw-bold">{{ $produk->nama }}</h2>
                <p class="fs-4 text-primary fw-bold">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

                <p><strong>SKU:</strong> RM-ID {{ $produk->id }}</p>
                <p><strong>Kategori:</strong> <span class="text-warning">{{ $produk->kategori->kategori }}</span></p>

                <div class="d-flex align-items-start mb-4">
                    <div>
                        <strong>Gratis Pengiriman</strong><br>
                        <small class="text-muted">Seluruh Pulau Jawa – Min. belanja IDR 5.000.000</small>
                    </div>
                </div>

                <!-- Form Tambah ke Keranjang -->
                <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST" class="d-flex mb-3">
                    @csrf
                    <input type="number" name="quantity" min="1" value="1" class="form-control w-auto me-2 text-center"
                        style="max-width: 80px;">
                    <button type="submit" class="btn btn-dark d-flex align-items-center">
                        <i class="bi bi-cart me-2"></i> Tambah ke Keranjang
                    </button>
                </form>
                <form action="{{ route('bayar-langsung') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <button type="submit" class="btn btn-success w-50">Beli Sekarang</button>
                </form>



                <br>


                <!-- Deskripsi dan Spesifikasi -->
                <div>
                    <h4 class="fw-bold mb-3">Deskripsi Produk</h4>
                    <hr>
                    <p><strong>{{ $produk->nama }}</strong></p>
                    <p>{{ $produk->deskripsi }}</p>

                    @if($produk->spesifikasi)
                        <h5 class="fw-bold mt-4">Spesifikasi Produk:</h5>
                        <ul>
                            @foreach (explode(';', $produk->spesifikasi) as $item)
                                <li>{{ trim($item) }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                @if(auth()->check())
                    <form action="{{ route('ulasans.store') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                        <div>
                            <label for="rating">Rating:</label>
                            <select name="rating" required>
                                <option value="">Pilih rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mt-2">
                            <textarea name="ulasan" rows="3" class="w-full border p-2" placeholder="Tulis ulasan kamu..."
                                required></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Kirim Ulasan</button>
                    </form>
                @else
                    <p class="text-gray-600">Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a>
                        untuk menulis ulasan.</p>
                @endif
            </div>
        </div>
    </div>
@endsection