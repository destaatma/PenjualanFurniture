@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"> Tambah Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/kategori">Kategori</a></li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
    <!-- Form Tambah Kategori -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <i class="fas fa-folder-plus"></i> Tambah Kategori Baru
        </div>
        <div class="card-body">
            <div class="container">
                <div class="table-responsive">
        <form action="/dashboard/tanamanherbal/" method="POST" class="mb-5">
                    <form>
                        <div class="row justify-content-center">
                            <div class="mb-2 col-6">
                                <label for="kategoriID" class="form-label">ID Kategori</label>
                                <input type="text" class="form-control form-control-sm" id="kategoriID" name="kategoriID"
                                    required>
                            </div>

                            <div class="mb-2 col-6">
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
    </div>
</main>

@endsection
