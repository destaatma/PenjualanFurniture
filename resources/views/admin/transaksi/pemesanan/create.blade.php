@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Pemesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.pemesanan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Pemesanan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-shopping-cart me-1"></i> Tambah Pemesanan
            </div>
            <div class="card-body">
                <form action="{{ route('admin.transaksi.pemesanan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="detail_pemesanan_id" class="form-label">Detail Pemesanan</label>
                        <select name="detail_pemesanan_id" id="detail_pemesanan_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Detail Pemesanan</option>
                            @foreach ($detail_pemesanans as $d)
                            <option value="{{ $d->id }}">{{ $d->produk->nama }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Pelanggan</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Pelanggan</option>
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" name="total_harga" class="form-control" id="total_harga" placeholder="Masukkan total harga pemesanan" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="datetime-local" name="tanggal_pemesanan" class="form-control" value="{{ old('tanggal_pemesanan', date('Y-m-d\TH:i', strtotime($pemesanan->tanggal_pemesanan ?? now()))) }}">
                    </div>

                    <div class="mb-3">
                        <label for="status_pemesanan" class="form-label">Status Pemesanan</label>
                        <select name="status_pemesanan" id="status_pemesanan" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Menunggu">Menunggu</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Dikirim">Dikirim</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.transaksi.pemesanan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
