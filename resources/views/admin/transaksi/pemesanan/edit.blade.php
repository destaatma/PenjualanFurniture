@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Edit Pemesanan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ route('admin.transaksi.pemesanan.index') }}"
                        class="text-primary">Data
                        Pemesanan</a></li>
                <li class="breadcrumb-item active">Edit Pemesanan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-primary text-dark">
                    <i class="fas fa-edit me-1"></i> Edit Pemesanan
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.pemesanan.update', $pemesanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Produk dalam Pemesanan</label>
                            <ul class="list-group">
                                @forelse ($pemesanan->detailPemesanan as $detail)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $detail->produk->nama ?? '-' }}</strong><br>
                                            Jumlah: {{ $detail->jumlah_produk }}<br>
                                            Harga: Rp {{ number_format($detail->harga, 0, ',', '.') }}<br>
                                            Subtotal: Rp {{ number_format($detail->harga_subtotal, 0, ',', '.') }}
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted">Tidak ada detail pemesanan</li>
                                @endforelse
                            </ul>



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
