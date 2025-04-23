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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: url('https://source.unsplash.com/random/1600x900?technology') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-gradient {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            border: none;
            color: white;
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #0072ff, #00c6ff);
        }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-success text-white">
                                    <h3 class="text-center font-weight-light my-4">Registrasi Akun</h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputName" type="text" placeholder="Nama Lengkap" />
                                            <label for="inputName">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPhone" type="tel" placeholder="Nomor Telepon" />
                                            <label for="inputPhone">Nomor Telepon</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="inputAddress" placeholder="Alamat Lengkap"></textarea>
                                            <label for="inputAddress">Alamat Lengkap</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-success" href="/login">Sudah punya akun? Login!</a>
                                            <button class="btn btn-success px-4">Register</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/dashboard/js/scripts.js') }}"></script>
</body>

</html>
