@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/produk">Produk</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>

            <!-- Form Tambah Pengguna -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-user-plus"></i> Tambah Produk Baru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <div class="container"><!-- Membuat form lebih kecil -->
                        <form>
                            <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="produkID" class="form-label">ID Produk</label>
                                    <input type="text" class="form-control form-control-sm" id="produkID"
                                        name="produkID" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="kategoriID" class="form-label">ID Kategori</label>
                                    <input type="text" class="form-control form-control-sm" id="kategoriID"
                                        name="kategoriID" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkNama" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control form-control-sm" id="produkNama"
                                        name="produkNama" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkHarga" class="form-label">Harga</label>
                                    <input type="number" class="form-control form-control-sm" id="produkHarga"
                                        name="produkHarga" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkDeskripsi" class="form-label">Deskripsi Produk</label>
                                    <input class="form-control form-control-sm" id="produkDeskripsi" name="produkDeskripsi"
                                        required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkGambar" class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control form-control-sm" id="produkGambar"
                                        name="produkGambar" accept="image/*">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Simpan Produk</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
    </main>
@endsection
