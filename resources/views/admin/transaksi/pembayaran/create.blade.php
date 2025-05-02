@extends('layouts.admin.app')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> Tambah Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pembayaran">Pembayaran</a></li>
            <li class="breadcrumb-item active">Tambah Pembayaran</li>
        </ol>
     <!-- Form Pembayaran -->
     <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <i class="fas fa-credit-card"></i> Tambah Pembayaran Baru
        </div>
        <div class="card-body">
            <div class="container">
                <form>
                    <div class="row justify-content-center">

                        <div class="mb-2 col-6">
                            <label for="payment_id" class="form-label">ID Pembayaran</label>
                            <input type="text" class="form-control form-control-sm" id="payment_id" name="payment_id" required>
                        </div>

                        <div class="mb-2 col-6">
                            <label for="order_id" class="form-label">ID Pemesanan</label>
                            <input type="text" class="form-control form-control-sm" id="order_id" name="order_id" required>
                        </div>

                        <div class="mb-2 col-6">
                            <label for="token" class="form-label">Token Pembayaran</label>
                            <input type="text" class="form-control form-control-sm" id="token" name="token" required>
                        </div>

                        <div class="mb-2 col-6">
                            <label for="amount" class="form-label">Jumlah Bayar</label>
                            <input type="number" class="form-control form-control-sm" id="amount" name="amount" required>
                        </div>

                        <div class="mb-2 col-6">
                            <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control form-control-sm" id="payment_date" name="payment_date" required>
                        </div>

                        <div class="mb-2 col-6">
                            <label for="status" class="form-label">Status Pembayaran</label>
                            <select class="form-select form-select-sm" id="status" name="status">
                                <option value="pending">Menunggu Konfirmasi</option>
                                <option value="paid">Dibayar</option>
                                <option value="failed">Gagal</option>
                                <option value="refunded">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Simpan Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
