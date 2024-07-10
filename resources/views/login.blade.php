<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tittle ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <style>
        * {
            font-family: "Ubuntu", sans-serif;
        }

        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('template/img/mesh.png');
            background-size: cover;
            background-position: center;
        }

        .login-heading {
            font-weight: 600;
        }

        .text-futer {
            color: darkgray;
            padding-top: 4rem;
        }

        .p {
            border-radius: 8px;
            height: 48px;
        }

        .jarak {
            margin-bottom: 6rem;
            margin-top: 1rem;
        }

        .btn-login {
            background-color: #6499E9;
        }

        .btn-login:hover {
            background-color: #2574EA;
            animation-duration: 9s;
        }
    </style>
</head>

<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image img-fluid"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                @php
                                    use Carbon\Carbon;
                                @endphp
                                <marquee direction="left" scrollamount="8">Pendaftaran magang periode {{ $periode_magang['nama_periode'] }} mulai pada tanggal {{ Carbon::parse($periode_magang['tanggal_mulai'])->format('d M Y') }} s.d {{ Carbon::parse($periode_magang['tanggal_selesai'])->format('d M Y') }}</marquee>
                            </div>
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <!-- <h1 class="login-heading mb-4">DKP Jawa Timur</h1> -->
                                <img src="template/img/dkp.png" alt="" class=" jarak mx-auto d-block img-fluid">
                                <!-- Sign In Form -->
                                <form method="post" action="/login">
                                    {{ csrf_field() }}
                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Email address</label>
                                        <input type="email"
                                            class="form-control p @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="name@example.com" autofocus required
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <label for="floatingPassword">Password</label>
                                        <input type="password"
                                            class="form-control p @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <div class="text d-inline float-right">
                                            <a class="small" href="/register">Belum punya akun? Daftar</a>
                                        </div>
                                    </div>

                                    <div class="d-grid mt-4 pt-4">
                                        <button
                                            class="btn btn-primary btn-login text-uppercase fw-bold mt-4 p form-control"
                                            type="submit"><strong>Login</strong></button>
                                        <!-- <button class="btn btn-lg btn-default btn-login text-uppercase fw-bold mb-2" type="submit">Sign up</button> -->
                                    </div>
                                </form>

                                <footer class="text-center">
                                    <p class="small text-futer">Centralized Internship Information System © 2024</p>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="template/dist/js/adminlte.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
        };
        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
        @if (session('loginError'))
            toastr.error('{{ session('loginError') }}');
        @endif
    </script>
</body>

</html>
