@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Pengiriman</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/pengiriman">Pengiriman</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-truck me-1"></i> Form Edit Pengiriman
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.pengiriman.update', $pengiriman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="pemesanan_id" class="form-label">Pemesanan</label>
                            <select name="pemesanan_id" class="form-control" required>
                                <option disabled>Pilih ID Pemesanan</option>
                                @foreach($pemesanans as $p)
                                    <option value="{{ $p->id }}" {{ $pengiriman->pemesanan_id == $p->id ? 'selected' : '' }}>
                                        {{ $p->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                            <input type="datetime-local" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control"
                                   value="{{ \Carbon\Carbon::parse($pengiriman->tanggal_pengiriman)->format('Y-m-d\TH:i') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pengiriman" class="form-label">Status Pengiriman</label>
                            <select name="status_pengiriman" id="status_pengiriman" class="form-control" required>
                                <option value="Diproses" {{ $pengiriman->status_pengiriman == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Dikirim" {{ $pengiriman->status_pengiriman == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                <option value="Selesai" {{ $pengiriman->status_pengiriman == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/admin/pengiriman" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
