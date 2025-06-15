@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Tambah Detail</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.detail_pemesanan.index') }}"
                        class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Detail Pemesanan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-plus me-1"></i> Tambah Detail
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.detail_pemesanan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="pemesanan_id" class="form-label">Pemesanan</label>
                            <select name="pemesanan_id" id="pemesanan_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Pemesanan</option>
                                @foreach ($pemesanans as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->user->nama ?? '-' }} |
                                        {{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->format('d-m-Y') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

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
                            <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                            <input type="number" name="jumlah_produk" class="form-control" id="jumlah_produk" min="1"
                                placeholder="Masukkan jumlah produk" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Satuan</label>
                            <input type="number" name="harga" class="form-control" id="harga"
                                placeholder="Masukkan harga satuan" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_subtotal" class="form-label">Harga Subtotal</label>
                            <input type="number" name="harga_subtotal" class="form-control" id="harga_subtotal"
                                placeholder="Masukkan harga subtotal" required>
                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Simpan
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