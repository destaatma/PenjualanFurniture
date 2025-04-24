@extends('layouts.admin.app')

@section('content')

<style>
    .container .col-md-6 {
    max-width: 500px; /* Membatasi ukuran form */
}

.form-control-sm {
    padding: 6px;
}

.card-header i {
    margin-right: 8px; /* Agar ikon lebih dekat dengan teks */
}
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ulasan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Ulasan Produk</li>
        </ol>

        <!-- Form Tambah Ulasan -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-comment"></i> Tambah Ulasan Produk
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12"> <!-- Membuat form lebih kecil -->
                            <form>
                                <div class="mb-2">
                                    <label for="customer_name" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" required>
                                </div>

                                <div class="mb-2">
                                    <label for="product_id" class="form-label">Pilih Produk</label>
                                    <select class="form-select form-select-sm" id="product_id" name="product_id" required>
                                        <option value="1">Produk A</option>
                                        <option value="2">Produk B</option>
                                        <option value="3">Produk C</option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label for="rating" class="form-label">Rating</label>
                                    <select class="form-select form-select-sm" id="rating" name="rating" required>
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label for="review" class="form-label">Ulasan</label>
                                    <textarea class="form-control form-control-sm" id="review" name="review" rows="2" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Kirim Ulasan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Ulasan -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-comments"></i> Daftar Ulasan Produk
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Pelanggan</th>
                                <th>Produk</th>
                                <th>Rating</th>
                                <th>Ulasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Desta</td>
                                <td>Produk A</td>
                                <td>⭐⭐⭐⭐⭐</td>
                                <td>Sangat puas dengan kualitasnya!</td>
                                <td>
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-trash"></i> edit</button>
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
