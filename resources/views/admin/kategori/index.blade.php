@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-dark text-muted">Data Kategori</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="/admin" class="text-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Kategori Produk</li>
            </ol>

            <a href="/admin/kategori/create" class="btn btn-warning mb-3">
                <i class="fas fa-plus-circle"></i> Tambah
            </a>

            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-list-alt me-1"></i> Daftar Kategori Produk
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-hover table-bordered">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $k)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $k->kategori }}</td>
                                        <td>{{ $k->deskripsi }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.kategori.edit', $k->id) }}"
                                                    class="btn btn-warning btn-sm shadow-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.kategori.destroy', $k->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
