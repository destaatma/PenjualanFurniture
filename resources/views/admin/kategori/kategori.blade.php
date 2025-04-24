@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>

            <!-- Form Tambah Kategori -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-folder-plus"></i> Tambah Kategori Baru
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-12"> <!-- Form lebih kecil -->
                            <form>
                                <div class="row justify-content-center">
                                    <div class="mb-2 col-md-6">
                                        <label for="kategoriID" class="form-label">ID Kategori</label>
                                        <input type="text" class="form-control form-control-sm" id="kategoriID"
                                            name="kategoriID" required>
                                    </div>

                                    <div class="mb-2 col-md-6">
                                        <label for="kategoriNama" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control form-control-sm" id="kategoriNama"
                                            name="kategoriNama" required>
                                    </div>

                                    <div class="mb-2 col-md-12">
                                        <label for="kategoriDeskripsi" class="form-label">Deskripsi Kategori</label>
                                        <textarea class="form-control form-control-sm" id="kategoriDeskripsi"
                                            name="kategoriDeskripsi" rows="2" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Simpan Kategori</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Daftar Kategori -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-list-alt"></i> Daftar Kategori
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Furniture Kayu</td>
                                <td>Produk berbahan dasar kayu dengan desain klasik.</td>
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
        </div>
    </main>
@endsection
