@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/kategori">Kategori</a></li>
                <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>

            <!-- Form Edit Kategori -->
            <div class="card mb-4">
                <div class="card-header bg-success text-dark">
                    <i class="fas fa-edit"></i> Edit Kategori
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-12">

                            <form action="/admin/kategori/update" method="POST">
                                @csrf

                                <div class="row justify-content-center">
                                    <div class="mb-2 col-6">
                                        <label for="kategoriID" class="form-label">ID Kategori</label>
                                        <input type="text" class="form-control form-control-sm" id="kategoriID"
                                            name="kategoriID" value="{{ request()->get('id') }}" readonly>
                                    </div>

                                    <div class="mb-2 col-6">
                                        <label for="kategoriNama" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control form-control-sm" id="kategoriNama"
                                            name="kategoriNama" value="{{ request()->get('nama') }}" required>
                                    </div>

                                    <div class="mb-2 col-md-12">
                                        <label for="kategoriDeskripsi" class="form-label">Deskripsi Kategori</label>
                                        <textarea class="form-control form-control-sm" id="kategoriDeskripsi"
                                            name="kategoriDeskripsi" rows="2"
                                            required>{{ request()->get('deskripsi') }}</textarea>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                    <a href="/admin/kategori" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
