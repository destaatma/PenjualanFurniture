@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Edit Pemesanan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.pemesanan.index') }}" class="text-info">Data
                        Pemesanan</a></li>
                <li class="breadcrumb-item active">Edit Pemesanan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-info text-dark">
                    <i class="fas fa-edit me-1"></i> Edit Pemesanan
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.pemesanan.update', $pemesanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row justify-content-center">
                            <div class="mb-3 col-mb-6">
                                <label for="detail_pemesanan_id" class="form-label">Detail Pemesanan</label>
                                <select name="detail_pemesanan_id" id="detail_pemesanan_id" class="form-select" required>
                                    <option value="" disabled {{ is_null($pemesanan->detail_pemesanan_id) ? 'selected' : '' }}>Pilih Detail Pemesanan</option>
                                    @foreach ($detail_pemesanans as $d)
                                        <option value="{{ $d->id }}" {{ $pemesanan->detail_pemesanan_id == $d->id ? 'selected' : '' }}>
                                            {{ $d->produk->nama ?? 'Nama produk tidak ditemukan' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-mb-6">
                                <label for="user_id" class="form-label">Pelanggan</label>
                                <select name="user_id" id="user_id" class="form-select" required>
                                    <option value="" disabled>Pilih Pelanggan</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ (int) $pemesanan->user_id === (int) $user->id ? 'selected' : '' }}>
                                            {{ $user->nama ?? $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2 col-mb-6">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <input type="number" name="total_harga" class="form-control form-control-sm"
                                    id="total_harga" value="{{ $pemesanan->total_harga }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_pemesanan" class="form-label">Tanggal pemesanan</label>
                                <input type="datetime-local" name="tanggal_pemesanan" id="tanggal_pemesanan"
                                    class="form-control"
                                    value="{{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan)->format('Y-m-d\TH:i') }}"
                                    required>
                            </div>

                            <div class="mb-2 col-mb-6">
                                <label for="status_pemesanan" class="form-label">Status Pemesanan</label>
                                <select name="status_pemesanan" id="status_pemesanan" class="form-select" required>
                                    <option value="Menunggu" {{ $pemesanan->status_pemesanan == "Menunggu" ? 'selected' : '' }}>
                                        Menunggu</option>
                                    <option value="Diproses" {{ $pemesanan->status_pemesanan == "Diproses" ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="Dikirim" {{ $pemesanan->status_pemesanan == "Dikirim" ? 'selected' : '' }}>
                                        Dikirim</option>
                                    <option value="Selesai" {{ $pemesanan->status_pemesanan == "Selesai" ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Perbarui
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
