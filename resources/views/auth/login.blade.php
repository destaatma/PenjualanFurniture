<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Halaman Login Omah Mebel" />
    <meta name="author" content="Omah Mebel" />
    <title>Login - Omah Mebel</title>
    <link href="{{ url('/dashboard/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-white border-0 text-center">
                                    <h3 class="font-weight-light my-4">Masuk</h3>
                                    <p class="fs-6 text-muted">Silahkan masukkan informasi login anda</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf

                                        {{-- Kolom Email --}}
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                {{-- Menambahkan class is-invalid jika ada error email --}}
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    name="email" type="email" placeholder="Alamat Email"
                                                    value="{{ old('email') }}" required />
                                            </div>
                                            {{-- Pesan error HANYA untuk email. Termasuk error "credentials do not
                                            match". --}}
                                            @error('email')
                                                <div class="text-danger small mt-2">
                                                    {{-- Menerjemahkan pesan error default Laravel --}}
                                                    @if ($message === 'These credentials do not match our records.')
                                                        Email atau password yang Anda masukkan salah.
                                                    @else
                                                        {{ $message }}
                                                    @endif
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- Kolom Password --}}
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    name="password" type="password" placeholder="Password" required />
                                            </div>
                                            {{-- Pesan error HANYA untuk password --}}
                                            @error('password')
                                                <div class="text-danger small mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" id="inputRememberPassword"
                                                    name="remember" type="checkbox" />
                                                <label class="form-check-label" for="inputRememberPassword">Ingat Kata
                                                    Sandi</label>
                                            </div>
                                            <a class="small text-dark" href="{{ route('password.request') }}">Lupa
                                                Password?</a>
                                        </div>

                                        {{-- HAPUS BLOK @error('email') YANG KEDUA DARI SINI --}}

                                        <div class="mt-4 mb-3">
                                            <button type="submit" class="btn btn-dark w-100">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/register" class="text-dark">Belum Punya Akun? Buat
                                            Akun!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ url('/dashboard/js/scripts.js') }}"></script>
</body>

</html>