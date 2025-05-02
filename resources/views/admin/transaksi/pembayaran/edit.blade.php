@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pembayaran">Pembayaran</a></li>
            <li class="breadcrumb-item active">Edit Pembayaran</li>
        </ol>

        <!-- Form Edit Pembayaran -->
        <div class="card mb-4">
            <div class="card-header bg-success text-dark">
                <i class="fas fa-edit"></i> Edit Pembayaran
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="col-md-12">
                        <form>
                            <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="payment_id" class="form-label">ID Pembayaran</label>
                                    <input type="text" class="form-control form-control-sm" id="payment_id"
                                        name="payment_id" value="{{ request()->get('id') }}" readonly>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="order_id" class="form-label">ID Pemesanan</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id"
                                        name="order_id" value="{{ request()->get('order_id') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="token" class="form-label">Token Pembayaran</label>
                                    <input type="text" class="form-control form-control-sm" id="token"
                                        name="token" value="{{ request()->get('token') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="amount" class="form-label">Jumlah Bayar</label>
                                    <input type="number" class="form-control form-control-sm" id="amount"
                                        name="amount" value="{{ request()->get('amount') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                                    <input type="date" class="form-control form-control-sm" id="payment_date"
                                        name="payment_date" value="{{ request()->get('payment_date') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="status" class="form-label">Status Pembayaran</label>
                                    <select class="form-select form-select-sm" id="status" name="status">
                                        <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                        <option value="paid" {{ request()->get('status') == 'paid' ? 'selected' : '' }}>Dibayar</option>
                                        <option value="failed" {{ request()->get('status') == 'failed' ? 'selected' : '' }}>Gagal</option>
                                        <option value="refunded" {{ request()->get('status') == 'refunded' ? 'selected' : '' }}>Dikembalikan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <a href="/admin/pembayaran" class="btn btn-secondary btn-sm">
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
