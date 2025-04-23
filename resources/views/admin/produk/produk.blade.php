@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>

        <!-- Form Tambah Produk -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box-open"></i> Tambah Produk Baru
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="produkNama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="produkNama" name="produkNama" required>
                    </div>

                    <div class="mb-3">
                        <label for="produkKategori" class="form-label">Kategori</label>
                        <select class="form-select" id="produkKategori" name="produkKategori">
                            <option value="Furniture Kayu">Furniture Kayu</option>
                            <option value="Meja & Kursi">Meja & Kursi</option>
                            <option value="Dekorasi Rumah">Dekorasi Rumah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="produkHarga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="produkHarga" name="produkHarga" required>
                    </div>

                    <div class="mb-3">
                        <label for="produkStok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="produkStok" name="produkStok" required>
                    </div>

                    <div class="mb-3">
                        <label for="produkDeskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="produkDeskripsi" name="produkDeskripsi" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Produk</button>
                </form>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-list-alt"></i> Daftar Produk
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Meja Kayu Minimalis</td>
                            <td>Furniture Kayu</td>
                            <td>Rp 2.500.000</td>
                            <td>15</td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kursi Santai Modern</td>
                            <td>Meja & Kursi</td>
                            <td>Rp 1.750.000</td>
                            <td>10</td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection
