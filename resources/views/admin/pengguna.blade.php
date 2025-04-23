@extends('layouts.admin.app')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>

        <!-- Form Tambah Pengguna (Placeholder) -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Peran</label>
                        <select class="form-select" id="role" name="role">
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>
                            <option value="operator">Operator</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Pengguna</button>
                </form>
            </div>
        </div>

        <!-- Daftar Pengguna (Dummy Data) -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-users"></i> Daftar Pengguna
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Desta</td>
                            <td>desta@example.com</td>
                            <td>Admin</td>
                            <td>
                                <button class="btn btn-sm btn-success">Edit</button>
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
