@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-muted">Data Pengguna</h1>
        <ol class="breadcrumb mb-4 bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="/admin/ulasan" class="text-info">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>

        <!-- Daftar user -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <i class="fas fa-user me-1"></i> Daftar Pengguna
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $u->nama }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->telpon }}</td>
                                    <td>{{ $u->alamat }}</td>
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


