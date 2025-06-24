<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lupa Password - {{ config('app.name', 'Laravel') }}</title>
    {{-- Menggunakan asset() lebih disarankan untuk path ke public folder --}}
    <link href="{{ asset('dashboard/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                {{-- Header diubah sesuai konteks Lupa Password --}}
                                <div class="card-header bg-light text-dark">
                                    <h3 class="text-center font-weight-light my-4">Lupa Password</h3>
                                    <p class="mb-4 text-center text-dark fs-6">Kami akan mengirimkan link untuk mengatur
                                        ulang password ke email Anda.</p>
                                </div>

                                <div class="card-body">
                                    {{-- Notifikasi Status (Pesan Sukses) diletakkan di sini --}}
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="mb-3">
                                            {{-- Menggunakan input-group agar konsisten dengan halaman login --}}
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus
                                                    placeholder="Masukkan alamat email Anda">
                                            </div>

                                            @error('email')
                                                <div class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-3">
                                            <button type="submit" class="btn btn-dark col-6">
                                                {{ __('Kirim Link Reset') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Footer tambahan untuk kembali ke halaman login --}}
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a href="{{ route('login') }}" class="text-dark">Kembali ke Login</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
</body>

</html>