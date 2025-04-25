@extends('layouts.admin.app')

@section('content')

    <style>
        .container .col-md-6 {
            max-width: 500px;
            /* Membatasi ukuran form */
        }

        .form-control-sm {
            padding: 6px;
        }

        .img-thumbnail {
            border-radius: 5px;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>

            <!-- Form Tambah Produk -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-box"></i> Tambah Produk Baru
                </div>
                <div class="card-body">
                    <div class="container">
                        <form>
                            <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="produkID" class="form-label">ID Produk</label>
                                    <input type="text" class="form-control form-control-sm" id="produkID" name="produkID" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="kategoriID" class="form-label">ID Kategori</label>
                                    <input type="text" class="form-control form-control-sm" id="kategoriID" name="kategoriID" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkNama" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control form-control-sm" id="produkNama" name="produkNama" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkHarga" class="form-label">Harga</label>
                                    <input type="number" class="form-control form-control-sm" id="produkHarga" name="produkHarga" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkDeskripsi" class="form-label">Deskripsi Produk</label>
                                    <input class="form-control form-control-sm" id="produkDeskripsi" name="produkDeskripsi"  required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="produkGambar" class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control form-control-sm" id="produkGambar" name="produkGambar" accept="image/*">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Simpan Produk</button>
                        </form>
                    </div>
                </div>
            </div>


                <!-- Daftar Produk -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-table me-1"></i> Daftar Produk
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Produk</th>
                                    <th>ID Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Furniture Kayu</td>
                                    <td>Meja Kayu Minimalis</td>
                                    <td>Produk berbahan dasar kayu dengan desain klasik.</td>
                                    <td>Rp 2.500.000</td>
                                    <td><img src="/images/meja.jpg" class="img-thumbnail" width="80"></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Meja & Kursi</td>
                                    <td>Kursi Santai Modern</td>
                                    <td>Kursi dengan desain modern dan kenyamanan ekstra.</td>
                                    <td>Rp 1.750.000</td>
                                    <td><img src="/beranda/assets/images/product-1.jpg" class="img-thumbnail" width="80"></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>
@endsection
