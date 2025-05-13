@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/ulasan">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>

        <!-- Daftar Ulasan -->
        <a href="/admin/produk/create" class="btn btn-success mb-3 col-mb-3">Tambah</a>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
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
                                    <td>{{ $p->harga }}</td>
                                    <td><img src="{{asset('/storage/produk/'.$p->gambar)}}"/></td>
                                    <td>
                                    <div class="action-buttons d-flex gap-2">
                                        <a href="{{ route('admin.produk.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                <i class="fas fa-trash"></i>
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
