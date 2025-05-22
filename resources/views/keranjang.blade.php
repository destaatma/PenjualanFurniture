@extends('layouts.user.main')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center fw-bold">Keranjang Belanja</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(empty($keranjangs))
            <div class="alert alert-warning text-center">Keranjang Anda kosong.</div>
        @else
            <div class="list-group mb-4">
                @foreach ($keranjangs as $id => $item)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <img src="{{ asset('storage/' . $item['gambar']) }}" class="rounded" width="60" height="60">
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $item['nama'] }}</h5>
                                <small class="text-muted">Size: L | Warna: Hitam</small>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="number" class="form-control text-center quantity-input" data-id="{{ $id }}"
                                value="{{ $item['jumlah'] }}" min="1" style="width: 80px;">
                            <p class="fw-bold mt-2">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</p>
                        </div>
                        <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="border p-3 rounded bg-light">
                <h5 class="fw-bold">Total Keseluruhan:
                    <span class="text-primary">Rp
                        {{ number_format(array_sum(array_column($keranjangs, 'harga')) * array_sum(array_column($keranjangs, 'jumlah')), 0, ',', '.') }}</span>
                </h5>
                <div class="mt-3">
                    <label for="voucher" class="form-label">Gunakan Voucher</label>
                    <input type="text" class="form-control" id="voucher" placeholder="Masukkan kode voucher">
                </div>
                <div class="mt-4">
                    @if(Auth::check())
                        <a href="/checkout" class="btn btn-success w-100">Checkout</a>
                    @else
                        <a href="/login" class="btn btn-warning w-100">Login untuk Checkout</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection