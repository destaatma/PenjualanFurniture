@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Tambah Pemesanan</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.transaksi.pemesanan.index') }}" class="text-info">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tambah Pemesanan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-plus-circle me-1"></i>Tambah Pemesanan
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.transaksi.pemesanan.store') }}" method="POST">
                        @csrf

                        {{-- Dropdown Pelanggan --}}
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih Pelanggan</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Pelanggan --</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Total Harga --}}
                        <div class="mb-3">
                            <label class="form-label">Total Harga (Rp)</label>
                            <input type="number" name="total_harga" class="form-control" value="{{ $total_harga ?? 0 }}"
                                readonly>
                        </div>


                        {{-- Tanggal Pemesanan --}}
                        <div class="mb-3">
                            <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                            <input type="datetime-local" name="tanggal_pemesanan" id="tanggal_pemesanan"
                                class="form-control" required>
                        </div>

                        {{-- Status Pemesanan --}}
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

                        {{-- Tombol Aksi --}}
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.transaksi.pemesanan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection