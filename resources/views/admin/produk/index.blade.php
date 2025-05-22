@extends('layouts.admin.app')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Data Produk</h1>
            <ol class="breadcrumb mb-4  bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="/admin/ulasan" class="text-info">Dashboard</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>

            <!-- Daftar Ulasan -->
            <a href="{{ route('admin.produk.create') }}" class="btn btn-warning mb-3 col-mb-3">
                <i class="fas fa-plus-circle"></i> Tambah Produk
            </a>
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-box-open me-1"></i> Daftar Produk
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->kategori->kategori }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->deskripsi }}</td>
                                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                        <td><img src="{{asset('storage/' . $p->gambar)}}" width="120" /></td>
                                        <td>
                                            <div class="action-buttons d-flex gap-2">
                                                <a href="{{ route('admin.produk.show', $p->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.produk.edit', $p->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
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