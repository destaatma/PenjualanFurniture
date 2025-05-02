@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Pemesanan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pemesanan">Pemesanan</a></li>
            <li class="breadcrumb-item active">Edit Pemesanan</li>
        </ol>

        <!-- Form Edit Pemesanan -->
        <div class="card mb-4">
            <div class="card-header bg-success text-dark">
                <i class="fas fa-edit"></i> Edit Pemesanan
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="col-md-12">
                        <form>

                            <div class="row justify-content-center">
                                <div class="mb-2 col-6">
                                    <label for="order_id" class="form-label">ID Pemesanan</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id"
                                        name="order_id" value="{{ request()->get('id') }}" readonly>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="product_id" class="form-label">Produk</label>
                                    <select class="form-select form-select-sm" id="product_id" name="product_id">
                                        <option value="1" {{ request()->get('product_id') == 1 ? 'selected' : '' }}>Produk A</option>
                                        <option value="2" {{ request()->get('product_id') == 2 ? 'selected' : '' }}>Produk B</option>
                                        <option value="3" {{ request()->get('product_id') == 3 ? 'selected' : '' }}>Produk C</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="total_price" class="form-label">Total Harga</label>
                                    <input type="number" class="form-control form-control-sm" id="total_price"
                                        name="total_price" value="{{ request()->get('total_price') }}" required min="1">
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="order_date" class="form-label">Tanggal Pemesanan</label>
                                    <input type="date" class="form-control form-control-sm" id="order_date"
                                        name="order_date" value="{{ request()->get('order_date') }}" required>
                                </div>

                                <div class="mb-2 col-mb-6">
                                    <label for="status" class="form-label">Status Pemesanan</label>
                                    <select class="form-select form-select-sm" id="status" name="status">
                                        <option value="Diproses" {{ request()->get('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Dikirim" {{ request()->get('status') == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="Selesai" {{ request()->get('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Dibatalkan" {{ request()->get('status') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <a href="/admin/pemesanan" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
