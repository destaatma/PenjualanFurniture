@extends('layouts.admin.app')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.pembayaran.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Pembayaran</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-edit me-1"></i> Edit Pembayaran
            </div>
            <div class="card-body">
                <form action="{{ route('admin.transaksi.pembayaran.update', $pembayaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="pemesanan_id" class="form-label">Pemesanan</label>
                        <select name="pemesanan_id" id="pemesanan_id" class="form-select" required>
                            @foreach ($pemesanans as $p)
                                <option value="{{ $p->id }}" {{ $pembayaran->pemesanan_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->detail_pemesanan->produk->nama }} - Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="token" class="form-label">Token Pembayaran</label>
                        <input type="number" name="token" class="form-control" id="token"
                            value="{{ old('token', $pembayaran->token) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                        <input type="number" name="jumlah_bayar" class="form-control" id="jumlah_bayar"
                            value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                        <input type="datetime-local" name="tanggal_pembayaran" class="form-control"
                            value="{{ old('tanggal_pembayaran', date('Y-m-d\TH:i', strtotime($pembayaran->tanggal_pembayaran))) }}">
                    </div>

                    <div class="mb-3">
                        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                        <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                            <option value="Menunggu" {{ $pembayaran->status_pembayaran == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Dikonfirmasi" {{ $pembayaran->status_pembayaran == 'Dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                            <option value="Selesai" {{ $pembayaran->status_pembayaran == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
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
