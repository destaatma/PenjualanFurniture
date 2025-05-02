@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> Edit Pengiriman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pengiriman">Pengiriman</a></li>
            <li class="breadcrumb-item active">Edit Pengiriman</li>
        </ol>

        <!-- Form Edit Pengiriman -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <i class="fas fa-edit"></i> Edit Pengiriman
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="/admin/pengiriman/update/{{ request()->get('id') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row justify-content-center">
                            <div class="mb-2 col-6">
                                <label for="shipment_id" class="form-label">ID Pengiriman</label>
                                <input type="text" class="form-control form-control-sm" id="shipment_id"
                                    name="shipment_id" value="{{ request()->get('id') }}" readonly>
                            </div>

                            <div class="mb-2 col-6">
                                <label for="order_id" class="form-label">ID Pemesanan</label>
                                <input type="text" class="form-control form-control-sm" id="order_id"
                                    name="order_id" value="{{ request()->get('order_id') }}" required>
                            </div>

                            <div class="mb-2 col-6">
                                <label for="shipment_date" class="form-label">Tanggal Pengiriman</label>
                                <input type="date" class="form-control form-control-sm" id="shipment_date"
                                    name="shipment_date" value="{{ request()->get('shipment_date') }}" required>
                            </div>

                            <div class="mb-2 col-6">
                                <label for="status" class="form-label">Status Pengiriman</label>
                                <select class="form-select form-select-sm" id="status" name="status">
                                    <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Dalam Proses</option>
                                    <option value="shipped" {{ request()->get('status') == 'shipped' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="delivered" {{ request()->get('status') == 'delivered' ? 'selected' : '' }}>Tiba di Tujuan</option>
                                    <option value="failed" {{ request()->get('status') == 'failed' ? 'selected' : '' }}>Gagal</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="/admin/pengiriman" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
