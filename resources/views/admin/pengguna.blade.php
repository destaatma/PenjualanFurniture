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

        .card-header i {
            margin-right: 8px;
            /* Agar ikon lebih dekat dengan teks */
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Pengguna</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
            </ol>

            <!-- Form Tambah Pengguna -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
                </div>
                <div class="card-body">
                    <div class="container"><!-- Membuat form lebih kecil -->
                        <form>
                            <div class="row justify-content-center">

                                <div class="mb-2 col-6">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password"
                                        name="password" required>
                                </div>

                                <div class="mb-2 col-6">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control form-control-sm" id="phone" name="phone" required>
                                </div>

                                <div class="mb-2 col-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control form-control-sm" id="address" name="address" rows="2"
                                        required></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Simpan Pengguna</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Pengguna -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-table me-1"></i> Daftar Pengguna
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Desta</td>
                                <td>desta@example.com</td>
                                <td>081234567890</td>
                                <td>Pacitan, Jawa Timur</td>
                                <td>Admin</td>
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
