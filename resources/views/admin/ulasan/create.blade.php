@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Ulasan</li>
            <li class="breadcrumb-item active">Tambah Ulasan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-comment-alt"></i> Tambahkan Ulasan Baru
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="col-md-12">
                        <form>
                            <div class="row justify-content-center">
                                <div class="mb-2 col-6">
                                    <label for="customer_name" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" required>
                                </div>
                                <div class="mb-2 col-6">
                                    <label for="product_id" class="form-label">Pilih Produk</label>
                                    <select class="form-select form-select-sm" id="product_id" name="product_id" required>
                                        <option value="1">Produk A</option>
                                        <option value="2">Produk B</option>
                                        <option value="3">Produk C</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-6">
                                    <label for="rating" class="form-label">Rating</label>
                                    <select class="form-select form-select-sm" id="rating" name="rating" required>
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-6">
                                    <label for="review" class="form-label">Ulasan</label>
                                    <textarea class="form-control form-control-sm" id="review" name="review" rows="1" required></textarea>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                    <a href="/admin/ulasan" class="btn btn-secondary btn-sm">
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
