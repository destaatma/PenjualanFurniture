<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="{{ url('/dashboard/css/styles.css') }}" rel="stylesheet" />
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
                                <div class="card-header bg-light text-dark">
                                    <h3 class="text-center font-weight-light my-4">Masuk</h3>
                                    <p class="mb-4 text-center text-dark fs-5">Silahkan masukkan informasi login anda
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input class="form-control" name="email" type="email"
                                                    placeholder="name@example.com" required />
                                            </div>
                                        </div>
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input class="form-control" name="password" type="password"
                                                    placeholder="Password" required />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="form-check">
                                                {{-- Penambahan atribut name="remember" agar fitur "Remember Me" Laravel
                                                berfungsi --}}
                                                <input class="form-check-input" id="inputRememberPassword"
                                                    name="remember" type="checkbox" />
                                                <label class="form-check-label" for="inputRememberPassword">Ingat Kata
                                                    Sandi
                                                </label>
                                            </div>
                                            {{-- Ini adalah link untuk Lupa Password --}}
                                            <a class="small text-dark" href="{{ route('password.request') }}">Lupa
                                                Password?</a>
                                        </div>
                                        @error('email')
                                            <div class="text-danger">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-3">
                                            <button class="btn btn-dark col-4">Login</button>
                                        </div>
                                        <div class="card-footer text-center py-3">
                                            <div class="small"><a href="/register" class="text-dark">Belum Punya Akun?
                                                    Buat Akun !</a></div>
                                        </div>
                                    </form>
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
    <script src="{{ url('/dashboard/js/scripts.js') }}"></script>
</body>

</html>