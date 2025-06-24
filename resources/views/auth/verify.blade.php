@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    {{-- Menggunakan gaya kartu yang konsisten dengan halaman lain --}}
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header bg-light text-dark">
                            <h3 class="text-center font-weight-light my-4">Verifikasi Alamat Email Anda</h3>
                        </div>

                        <div class="card-body text-center">
                            {{-- Menampilkan pesan sukses jika email baru saja dikirim ulang --}}
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Link verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                                </div>
                            @endif

                            {{-- Icon untuk visual --}}
                            <div class="mb-3">
                                <i class="fas fa-envelope-open-text fa-4x text-primary"></i>
                            </div>

                            <p class="mb-4 text-dark fs-6">
                                {{ __('Sebelum melanjutkan, mohon periksa email Anda untuk menemukan link verifikasi.') }}
                            </p>

                            <p class="mb-0 text-dark fs-6">
                                {{ __('Jika Anda tidak menerima email,') }}
                            </p>

                            {{-- Form untuk meminta pengiriman ulang link verifikasi --}}
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-dark mt-2 px-4">{{ __('Kirim Ulang Link') }}</button>
                            </form>
                        </div>

                        <div class="card-footer text-center py-3">
                            <div class="small">
                                {{-- Tambahkan link untuk logout jika diperlukan --}}
                                <a href="{{ route('logout') }}" class="text-dark"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Bukan Anda? Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection