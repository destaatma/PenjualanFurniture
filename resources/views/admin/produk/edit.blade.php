@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/produk">Produk</a></li>
                <li class="breadcrumb-item active">Edit Produk</li>
            </ol>

            <!-- Form Edit Produk -->
            <div class="card mb-4">
                <div class="card-header bg-success text-dark">
                    <i class="fas fa-edit"></i> Edit Produk
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <div class="container">

                        <form action="/admin/produk/update/{{ request()->get('id') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="produkID" class="form-label">ID Produk</label>
                                    <input type="text" class="form-control form-control-sm" id="produkID"
                                        name="produkID" value="{{ request()->get('id') }}" readonly>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="kategoriID" class="form-label">ID Kategori</label>
                                    <input type="text" class="form-control form-control-sm" id="kategoriID"
                                        name="kategoriID" value="{{ request()->get('kategoriID') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkNama" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control form-control-sm" id="produkNama"
                                        name="produkNama" value="{{ request()->get('produkNama') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkHarga" class="form-label">Harga</label>
                                    <input type="number" class="form-control form-control-sm" id="produkHarga"
                                        name="produkHarga" value="{{ request()->get('produkHarga') }}" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkDeskripsi" class="form-label">Deskripsi Produk</label>
                                    <textarea class="form-control form-control-sm" id="produkDeskripsi"
                                        name="produkDeskripsi" rows="1" required>{{ request()->get('produkDeskripsi') }}</textarea>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkGambar" class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control form-control-sm" id="produkGambar"
                                        name="produkGambar" accept="image/*">
                                </div>

                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <a href="/admin/produk" class="btn btn-secondary btn-sm">
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


