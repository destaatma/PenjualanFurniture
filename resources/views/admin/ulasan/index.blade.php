@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Ulasan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/ulasan">Dashboard</a></li>
            <li class="breadcrumb-item active">Ulasan Produk</li>
        </ol>

        <!-- Daftar Ulasan -->
        <a href="/admin/ulasan/create" class="btn btn-success mb-3 col-mb-3">Tambah</a>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <i class="fas fa-chart-area me-1"></i> Daftar Ulasan Produk
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Produk</th>
                                <th>Nama Pemesan</th>
                                <th>Rating</th>
                                <th>Ulasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ulasans as $u)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $u->produk->nama }}</td>
                                    <td>{{ $u->user->nama }}</td>
                                    <td>{{ $u->rating }}</td>
                                    <td>{{ $u->ulasan }}</td>
                                     <td>
                                        <a href="{{ route('admin.ulasan.edit', $u->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.ulasan.destroy', $u->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
