@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ulasan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/ulasan">Dashboard</a></li>
            <li class="breadcrumb-item active">Ulasan Produk</li>
        </ol>

        <!-- Daftar Ulasan -->
        <a href="/admin/ulasan/create" class="btn btn-success mb-3 col-3">Tambahkan Ulasan</a>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-table me-1"></i> Daftar Ulasan Produk
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Pengguna</th>
                                <th>Rating</th>
                                <th>Ulasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Produk A</td>
                                <td>Desta</td>
                                <td>⭐⭐⭐⭐⭐</td>
                                <td>Sangat puas dengan kualitasnya!</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/admin/ulasan/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Produk B</td>
                                <td>Indah</td>
                                <td>⭐⭐⭐⭐</td>
                                <td>Bagus, tapi pengiriman sedikit lama.</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/admin/ulasan/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
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
