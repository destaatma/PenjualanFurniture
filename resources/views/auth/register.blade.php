<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
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
                                    <h3 class="text-center font-weight-light my-4">Buat Akun</h3>
                                    <p class="mb-4 text-center text-dark fs-5">Daftar dan buat akun di toko kami</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf

                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input class="form-control" name="nama" type="text"
                                                    placeholder="Nama Lengkap" required />
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input class="form-control" name="email" type="email"
                                                    placeholder="name@example.com" required />
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input class="form-control" name="password" type="password"
                                                    placeholder="Password" required />
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input class="form-control" name="password_confirmation" type="password"
                                                    placeholder="Konfirmasi Password" required />
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input class="form-control" name="telpon" type="number"
                                                    placeholder="Nomor Telpon" required />
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-map-marker-alt"></i></span>
                                                <textarea class="form-control" name="alamat"
                                                    placeholder="Alamat Lengkap" required></textarea>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-3">
                                            <button type="submit" class="btn btn-dark col-4">Daftar</button>
                                        </div>
                                        <div class="card-footer text-center py-3">
                                            <div class="small"><a href="/login" class="text-dark">Sudah Punya Akun?
                                                    Masuk !</a></div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ url('/dashboard/js/scripts.js') }}"></script>
</body>

</html>
