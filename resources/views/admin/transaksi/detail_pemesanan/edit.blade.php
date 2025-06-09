@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Edit Detail Pemesanan</h1>
            <ol class="breadcrumb mb-4  bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.detail_pemesanan.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Detail Pemesanan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-info text-dark">
                    <i class="fas fa-edit me-1"></i> Edit Detail Pemesanan
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.detail_pemesanan.update', $detailPemesanan->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="produk_id" class="form-label">Produk</label>
                            <select name="produk_id" id="produk_id" class="form-select" required>
                                <option value="" disabled>Pilih Produk</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" {{ $detailPemesanan->produk_id == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                            <input type="number" name="jumlah_produk" class="form-control" id="jumlah_produk" min="1"
                                value="{{ $detailPemesanan->jumlah_produk }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Satuan</label>
                            <input type="number" name="harga" class="form-control" id="harga"
                                value="{{ $detailPemesanan->harga }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_subtotal" class="form-label">Harga Subtotal</label>
                            <input type="number" name="harga_subtotal" class="form-control" id="harga_subtotal"
                                value="{{ $detailPemesanan->harga_subtotal }}" required>
                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Perbarui
                        </button>
                        <a href="{{ route('admin.transaksi.detail_pemesanan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
