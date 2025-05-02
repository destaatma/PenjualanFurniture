@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Ulasan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/ulasan">Ulasan Produk</a></li>
                <li class="breadcrumb-item active">Edit Ulasan</li>
            </ol>

            <!-- Form Edit Ulasan -->
            <div class="card mb-4">
                <div class="card-header bg-success text-dark">
                    <i class="fas fa-edit"></i> Edit Ulasan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <div class="container">
                        <div class="col-md-12">

                            <form">
                                <div class="row justify-content-center">
                                    <div class="mb-2 col-6">
                                        <label for="ulasanID" class="form-label">ID Ulasan</label>
                                        <input type="text" class="form-control form-control-sm" id="ulasanID"
                                            name="ulasanID" value="{{ request()->get('id') }}">
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="customer_name" class="form-label">Nama Pelanggan</label>
                                        <input type="text" class="form-control form-control-sm" id="customer_name"
                                            name="customer_name" value="{{ request()->get('customer_name') }}" required>
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="product_id" class="form-label">Produk</label>
                                        <input type="text" class="form-control form-control-sm" id="product_id"
                                            name="product_id" value="{{ request()->get('product_id') }}">
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="rating" class="form-label">Rating</label>
                                        <select class="form-select form-select-sm" id="rating" name="rating" required>
                                            <option value="1" {{ request()->get('rating') == '1' ? 'selected' : '' }}>⭐</option>
                                            <option value="2" {{ request()->get('rating') == '2' ? 'selected' : '' }}>⭐⭐</option>
                                            <option value="3" {{ request()->get('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐</option>
                                            <option value="4" {{ request()->get('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                                            <option value="5" {{ request()->get('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                                        </select>
                                    </div>

                                    <div class="mb-2 col-md-12">
                                        <label for="review" class="form-label">Ulasan</label>
                                        <textarea class="form-control form-control-sm" id="review"
                                            name="review" rows="3" required>{{ request()->get('review') }}</textarea>
                                    </div>
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
        </div>
    </main>
@endsection
