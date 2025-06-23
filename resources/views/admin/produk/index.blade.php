@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Data Produk</h1>
            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="/admin" class="text-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>

            <!-- Tombol Tambah Produk -->
            <a href="{{ route('admin.produk.create') }}" class="btn btn-warning mb-3">
                <i class="fas fa-plus-circle me-1"></i> Tambah
            </a>

            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-box-open me-1"></i> Daftar Produk
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th> {{-- Tambah kolom Stok --}}
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->kategori->kategori }}</td> {{-- Pastikan menggunakan $p->kategori->nama --}}
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->deskripsi }}</td>
                                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($p->stok == 'ready')
                                                <span class="badge bg-success">{{ ucfirst($p->stok) }}</span>
                                            @elseif ($p->stok == 'preorder')
                                                <span class="badge bg-info">{{ ucfirst($p->stok) }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ ucfirst($p->stok) }}</span>
                                            @endif
                                        </td> {{-- Tampilkan stok dengan badge --}}
                                        <td>
                                            @if($p->gambar)
                                                <img src="{{ asset('storage/' . $p->gambar) }}" width="120" alt="{{ $p->nama }}"
                                                    class="img-thumbnail">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.produk.show', $p->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.produk.edit', $p->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.produk.destroy', $p->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
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