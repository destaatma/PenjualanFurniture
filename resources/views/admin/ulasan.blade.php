@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ulasan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Ulasan Produk</li>
        </ol>

        <!-- Form Tambah Ulasan -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-comment"></i> Tambah Ulasan Produk
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Pilih Produk</label>
                        <select class="form-select" id="product_id" name="product_id" required>
                            <option value="1">Produk A</option>
                            <option value="2">Produk B</option>
                            <option value="3">Produk C</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="1">⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="review" class="form-label">Ulasan</label>
                        <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Kirim Ulasan</button>
                </form>
            </div>
        </div>

        <!-- Daftar Ulasan (Dummy Data) -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-comments"></i> Daftar Ulasan Produk
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
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
                                <button class="btn btn-sm btn-success">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
