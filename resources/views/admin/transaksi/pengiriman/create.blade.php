@extends('layouts.admin.app')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Pengiriman</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/pengiriman">Pengiriman</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-truck me-1"></i> Form Pengiriman
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.pengiriman.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="pemesanan_id" class="form-label">Pemesanan</label>
                            <select name="pemesanan_id" class="form-control">
                                <option selected disabled>Pilih ID Pemesanan</option>
                                @foreach($pemesanans as $p)
                                    <option value="{{ $p->id }}">
                                        {{ $p->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                            <input type="datetime-local" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pengiriman" class="form-label">Status Pengiriman</label>
                            <select name="status_pengiriman" id="status_pengiriman" class="form-control">
                                <option value="Diproses">Diproses</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="/admin/pengiriman" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
