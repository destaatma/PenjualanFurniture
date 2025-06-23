@extends('layouts.user.main') {{-- Pastikan layout ini ada dan sudah benar --}}

@section('content')

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="container" style="padding-top: 20px;">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Profil Pengguna</h1>
                        <p class="mb-4">
                            Lihat dan kelola informasi pribadi Anda di sini. Pastikan data Anda selalu yang terbaru.
                        </p>
                        <p>
                            <a href="{{ route('profil.edit') }}" class="btn btn-secondary me-2">Edit Profil</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center text-lg-end">
                            {{-- Foto Profil --}}
                            @if ($user->profile && $user->profile->foto_profil)
                                <img class="img-fluid rounded-circle shadow-lg"
                                    style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;"
                                    src="{{ asset('storage/' . $user->profile->foto_profil) }}" alt="Foto Profil">
                            @else
                                {{-- Avatar Default --}}
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow-lg"
                                    style="width: 150px; height: 150px; border: 4px solid #fff;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#adb5bd"
                                        class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8 text-center text-lg-start mt-3 mt-lg-0">
                            <h2 class="text-white h3">{{ $user->nama }}</h2>
                            <p class="text-white-50">{{ $user->email }}</p>
                            <span class="badge bg-light text-dark">{{ $user->role->nama ?? 'User' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Details Section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h3 class="h4 mb-3">Informasi Kontak</h3>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <strong>Email:</strong>
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <strong>Telepon:</strong>
                                <span>{{ $user->telpon ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h3 class="h4 mb-3">Alamat</h3>
                        <p class="text-muted">
                            {{ $user->profile->alamat ?? 'Alamat belum diatur.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Details Section -->

@endsection