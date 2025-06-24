@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{--
                    Menggunakan class 'card shadow-lg border-0 rounded-lg mt-5'
                    untuk mencocokkan gaya visual dari halaman reset password.
                    --}}
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        {{-- Header kartu dengan latar belakang terang dan teks gelap --}}
                        <div class="card-header bg-light text-dark">
                            <h3 class="text-center font-weight-light my-4">{{ __('Dashboard') }}</h3>
                        </div>

                        <div class="card-body">
                            {{-- Menampilkan status session jika ada (misalnya: 'password berhasil diupdate') --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- Pesan sambutan yang dipersonalisasi untuk pengguna yang login --}}
                            <div class="text-center">
                                <h4 class="mb-3">Selamat Datang, {{ Auth::user()->name }}!</h4>
                                <p class="fs-6">{{ __('Anda telah berhasil login ke dalam sistem.') }}</p>
                            </div>
                        </div>

                        {{-- Footer kartu sebagai pemanis, bisa diisi link atau informasi tambahan --}}
                        <div class="card-footer text-center py-3">
                            <div class="small text-muted">
                                Login pada: {{ now()->translatedFormat('l, j F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection