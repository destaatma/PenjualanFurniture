@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Tambah Pembayaran</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.transaksi.pembayaran.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tambah Pembayaran</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-credit-card me-1"></i> Tambah Pembayaran
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.pembayaran.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="pemesanan_id" class="form-label">Pemesanan</label>
                            <select name="pemesanan_id" id="pemesanan_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Pemesanan</option>
                                @foreach($pemesanans as $p)
                                    <option value="{{ $p->id }}">
                                        @foreach($p->detail_pemesanan as $detail)
                                            {{ $detail->produk->nama }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                        - Rp{{ number_format($p->total_harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="alert alert-info">
                            Token pembayaran (snap_token) akan otomatis dihasilkan oleh sistem ketika pembayaran dilakukan.
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar"
                                placeholder="Masukkan jumlah pembayaran" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                            <input type="datetime-local" name="tanggal_pembayaran" id="tanggal_pembayaran"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="Menunggu">Proses</option>
                                <option value="Dikonfirmasi">Berhasil</option>
                                <option value="Selesai">Gagal</option>

                            </select>

                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.transaksi.pembayaran.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection