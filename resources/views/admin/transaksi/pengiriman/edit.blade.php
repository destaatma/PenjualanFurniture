@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Edit Pengiriman</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengiriman</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-primary">
                    <i class="fas fa-truck me-1"></i>Edit Pengiriman
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.pengiriman.update', $pengiriman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="pemesanan_id" class="form-label">Pemesanan</label>
                            <select name="pemesanan_id" class="form-control" required>
                                <option disabled selected>Pilih ID Pemesanan</option>
                                @foreach($pemesanans as $p)
                                    <option value="{{ $p->id }}" {{ $pengiriman->pemesanan_id == $p->id ? 'selected' : '' }}>
                                        {{ $p->user->nama ?? '-' }} |
                                        {{ \Carbon\Carbon::parse($p->tanggal_pemesanan)->format('d-m-Y') }} |
                                        @foreach ($p->detailPemesanan as $detail)
                                            {{ $detail->produk->nama }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                            <input type="datetime-local" name="tanggal_pengiriman" id="tanggal_pengiriman"
                                class="form-control"
                                value="{{ \Carbon\Carbon::parse($pengiriman->tanggal_pengiriman)->format('Y-m-d\TH:i') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pengiriman" class="form-label">Status Pengiriman</label>
                            <select name="status_pengiriman" id="status_pengiriman" class="form-control" required>
                                <option value="Diproses" {{ $pengiriman->status_pengiriman == 'Diproses' ? 'selected' : '' }}>
                                    Diproses</option>
                                <option value="Dikirim" {{ $pengiriman->status_pengiriman == 'Dikirim' ? 'selected' : '' }}>
                                    Dikirim</option>
                                <option value="Selesai" {{ $pengiriman->status_pengiriman == 'Selesai' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.transaksi.pengiriman.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
