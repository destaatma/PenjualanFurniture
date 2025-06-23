@extends('layouts.user.main') {{-- Pastikan layout ini ada dan sudah benar --}}

@section('content')

    {{-- Menampilkan Error Validasi --}}
    @if ($errors->any())
        <div class="container" style="padding-top: 20px;">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Oops! Terjadi kesalahan:</h4>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Edit Profil</h1>
                            <p class="mb-4">
                                Perbarui informasi pribadi Anda di sini. Klik "Simpan Perubahan" jika sudah selesai.
                            </p>
                            <p>
                                <button type="submit" class="btn btn-secondary me-2">Simpan Perubahan</button>
                                <a href="{{ route('profil.show') }}" class="btn btn-white-outline">Batal</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center text-lg-end">
                                <label for="foto_profil" class="d-block" style="cursor: pointer;">
                                    <img id="imagePreview" class="img-fluid rounded-circle shadow-lg"
                                        style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;"
                                        src="{{ $user->profile && $user->profile->foto_profil ? asset('storage/' . $user->profile->foto_profil) : 'https://via.placeholder.com/150' }}"
                                        alt="Foto Profil Preview">
                                </label>
                                <input type="file" name="foto_profil" id="foto_profil" class="d-none"
                                    onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="col-md-8 text-center text-lg-start mt-3 mt-lg-0">
                                <h2 class="text-white h3">{{ $user->nama }}</h2>
                                <p class="text-white-50">Klik pada gambar untuk mengganti foto profil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->

        <!-- Start Form Details Section -->
        <div class="untree_co-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <h3 class="h4 mb-4">Informasi Utama</h3>
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama', $user->nama) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="telpon" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telpon" name="telpon"
                                    value="{{ old('telpon', $user->telpon) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <h3 class="h4 mb-4">Alamat & Keamanan</h3>
                            <div class="form-group mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat"
                                    rows="3">{{ old('alamat', $user->profile->alamat ?? '') }}</textarea>
                            </div>
                            <hr class="my-4">
                            <p class="text-muted small">Kosongkan jika tidak ingin mengubah password.</p>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <!-- Tombol Aksi Bawah -->
                <div class="row mt-5">
                    <div class="col text-end">
                        <a href="{{ route('profil.show') }}" class="btn btn-outline-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- End Form Details Section -->

    </form>

@endsection
