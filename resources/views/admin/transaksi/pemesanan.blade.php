@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pemesanan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pemesanan Produk</li>
        </ol>

        <!-- Form Pemesanan -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-shopping-cart"></i> Tambah Pemesanan Baru
            </div>
            <div class="card-body">
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Produk</label>
                        <select class="form-select" id="product_id" name="product_id">
                            <option value="1">Produk A</option>
                            <option value="2">Produk B</option>
                            <option value="3">Produk C</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                    </div>

                    <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                </form>
            </div>
        </div>

        <!-- Daftar Pemesanan -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-list-alt"></i> Daftar Pemesanan
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Pemesanan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>Produk A</td>
                            <td>3</td>
                            <td><span class="badge bg-success">Diproses</span></td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1002</td>
                            <td>Produk B</td>
                            <td>1</td>
                            <td><span class="badge bg-danger">Dibatalkan</span></td>
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
