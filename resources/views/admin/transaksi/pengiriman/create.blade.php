@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> Tambah Pengiriman</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/pengiriman">Pengiriman</a></li>
            <li class="breadcrumb-item active">Tambah Pengiriman</li>
        </ol>

               <!-- Form Pengiriman -->
               <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-truck"></i> Tambah Pengiriman Baru
                </div>
                <div class="card-body">
                    <div class="container">
                                <form>

                                    <div class="row justify-content-center">

                                    <div class="mb-2 col-6">
                                        <label for="shipment_id" class="form-label">ID Pengiriman</label>
                                        <input type="text" class="form-control form-control-sm" id="shipment_id" name="shipment_id" required>
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="order_id" class="form-label">ID Pemesanan</label>
                                        <input type="text" class="form-control form-control-sm" id="order_id" name="order_id" required>
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="shipment_date" class="form-label">Tanggal Pengiriman</label>
                                        <input type="date" class="form-control form-control-sm" id="shipment_date" name="shipment_date" required>
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="status" class="form-label">Status Pengiriman</label>
                                        <select class="form-select form-select-sm" id="status" name="status">
                                            <option value="pending">Dalam Proses</option>
                                            <option value="shipped">Dikirim</option>
                                            <option value="delivered">Tiba di Tujuan</option>
                                            <option value="failed">Gagal</option>
                                        </select>
                                    </div>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-sm">Simpan Pengiriman</button>
                                </form>
                            </div>
                        </div>
                    </div>
</main>
@endsection
