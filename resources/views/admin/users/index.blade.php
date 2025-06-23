@extends('layouts.admin.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-muted">Data Pengguna</h1>

            <ol class="breadcrumb mb-4 bg-light p-3 rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.beranda.index') }}" class="text-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Pengguna</li>
            </ol>

            {{-- Menampilkan pesan sukses jika ada --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-users me-1"></i> Daftar Pengguna
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>Alamat</th> {{-- Kolom Alamat --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $u->nama }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->telpon ?? '-' }}</td>

                                        {{--
                                        INI BAGIAN YANG DIPERBAIKI
                                        - Mengakses 'alamat' melalui relasi 'profile'.
                                        - '?->' (Nullsafe operator) digunakan agar tidak error jika user belum punya profil.
                                        - '??' (Null coalescing operator) digunakan untuk menampilkan 'Belum diisi' jika
                                        alamatnya null.
                                        --}}
                                        <td>{{ $u->profile?->alamat ?? 'Belum diisi' }}</td>

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Form untuk menghapus user --}}
                                                <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus pengguna \'{{ $u->nama }}\' secara permanen?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
