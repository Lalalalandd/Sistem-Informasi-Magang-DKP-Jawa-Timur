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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css?v=3.2.0">
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

        /* .login-heading {
            font-weight: 600;
        } */

        .text-futer {
            color: darkgray;
            padding-top: 4rem;
        }

        .p {
            border-radius: 8px !important;
            height: 48px !important;
        }

        .jarak {
            margin-bottom: 6rem;
            margin-top: 1rem;
        }

        .btn-login {
            background-color: #6499E9 !important;
        }

        .btn-login:hover {
            background-color: #2574EA !important;
            animation-duration: 9s !important;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        .btn {
            border-radius: 24px;
            font-weight: 500;

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
                            <div class="col-sm-10 mb-2 pb-2">
                                <a class="float-right btn btn-outline-primary" style="border-radius: 18px;"
                                    href="/"><i><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M16.62 2.99a1.25 1.25 0 0 0-1.77 0L6.54 11.3a.996.996 0 0 0 0 1.41l8.31 8.31c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.38 12l7.25-7.25c.48-.48.48-1.28-.01-1.76" />
                                        </svg></i> Kembali Login</a>
                            </div>
                            <div class="col-md-9 col=lg-8 mt-4 mx-auto">
                                <img src="template/img/dkp.png" alt="" class=" jarak mx-auto d-block img-fluid">
                            </div>
                            <div class="col-md-9 col-lg-8 mx-auto">
                                {{-- <h1 class="login-heading mb-4"><span style="color:#007BFF;">Register</span> • CIIS</h1> --}}
                                <form method="post" action="/register" enctype="multipart/form-data" id="registerForm">
                                    @csrf
                                    <div id="step1" class="step-content active">
                                        <h4 class="mb-4 text-bold d-flex align-items-center"><span
                                                style="color:#007BFF;"><i><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1.5em" height="1.5em" viewBox="0 0 24 24"
                                                        class="mr-2">
                                                        <path fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 20c0-1.742-1.67-3.223-4-3.773M15 20c0-2.21-2.686-4-6-4s-6 1.79-6 4m12-7a4 4 0 0 0 0-8m-6 8a4 4 0 1 1 0-8a4 4 0 0 1 0 8" />
                                                    </svg></i>Step 1: &nbsp;</span>Informasi Magang
                                        </h4>
                                        <div class="form-group mb-3">
                                            <label for="">Nama Ketua Kelompok</label>
                                            <input class="form-control p @error('name') is-invalid @enderror"
                                                id="name" name="name" type="text"
                                                placeholder="Masukkan nama ketua kelompok" autofocus
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="floatingInput">Nama Anggota Kelompok 1</label>
                                            <input type="text"
                                                class="form-control p @error('nama_kelompok_1') is-invalid @enderror"
                                                id="nama_kelompok_1" name="nama_kelompok_1"
                                                placeholder="Masukkan Anggota Kelompok 1 (Opsional)"
                                                value="{{ old('nama_kelompok_1') }}">
                                            @error('nama_kelompok_1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 position-relative">
                                            <label for="">Nama Anggota Kelompok 2</label>
                                            <input type="text"
                                                class="form-control p @error('nama_kelompok_2') is-invalid @enderror"
                                                id="nama_kelompok_2" name="nama_kelompok_2"
                                                placeholder="Masukkan  Anggota Kelompok 2 (Opsional)"
                                                value="{{ old('nama_kelompok_2') }}">
                                            @error('nama_kelompok_2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 ">
                                            <label for="">Universitas</label>
                                            <input type="text"
                                                class="form-control p @error('universitas') is-invalid @enderror"
                                                id="universitas" name="universitas" placeholder="Masukkan universitas"
                                                value="{{ old('universitas') }}">
                                            @error('universitas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Fakultas</label>
                                            <input type="text"
                                                class="form-control p @error('fakultas') is-invalid @enderror"
                                                id="fakultas" name="fakultas" placeholder="Masukkan fakultas"
                                                value="{{ old('fakultas') }}">
                                            @error('fakultas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Program Studi</label>
                                            <input type="text"
                                                class="form-control p @error('prodi') is-invalid @enderror"
                                                id="prodi" name="prodi" placeholder="Masukkan prodi"
                                                value="{{ old('prodi') }}">
                                            @error('prodi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary float-right mt-4"
                                            id="nextStep1">Selanjutnya</button>
                                    </div>

                                    <div id="step2" class="step-content">
                                        <h4 class="mb-4 text-bold d-flex align-items-center"><span
                                                style="color:#007BFF;"><i><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1.5em" height="1.5em" viewBox="0 0 256 256"
                                                        class="mr-2">
                                                        <path fill="currentColor"
                                                            d="M248 208h-16V96a8 8 0 0 0 0-16h-48V48a8 8 0 0 0 0-16H40a8 8 0 0 0 0 16v160H24a8 8 0 0 0 0 16h224a8 8 0 0 0 0-16M216 96v112h-32V96ZM56 48h112v160h-24v-48a8 8 0 0 0-8-8H88a8 8 0 0 0-8 8v48H56Zm72 160H96v-40h32ZM72 80a8 8 0 0 1 8-8h16a8 8 0 0 1 0 16H80a8 8 0 0 1-8-8m48 0a8 8 0 0 1 8-8h16a8 8 0 0 1 0 16h-16a8 8 0 0 1-8-8m-48 40a8 8 0 0 1 8-8h16a8 8 0 0 1 0 16H80a8 8 0 0 1-8-8m48 0a8 8 0 0 1 8-8h16a8 8 0 0 1 0 16h-16a8 8 0 0 1-8-8" />
                                                    </svg></i>Step 2: &nbsp;</span>Pendaftaran Magang
                                        </h4>

                                        <div class="form-group">
                                            <label>Dinas</label>
                                            <select
                                                class="form-control select2 select2-purple p @error('dinas') is-invalid @enderror"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;"
                                                value="{{ old('dinas') }}" name="dinas_id" id="dinas">
                                                <option selected="selected" disabled>Pilih Dinas</option>
                                                @foreach ($dinas as $option)
                                                    <option value="{{ $option->id }}">
                                                        {{ $option->dinas }}</option>
                                                @endforeach
                                            </select>
                                            @error('dinas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sub_bagian">Sub Bagian</label>
                                            <select
                                                class="form-control select2 select2-purple p @error('sub_bagian') is-invalid @enderror"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;"
                                                name="sub_bagian" id="sub_bagian">
                                                <option selected disabled>Pilih Sub Bagian</option>
                                                @foreach ($sub_bagian as $option)
                                                    <option value="{{ $option->sub_bagian }}">
                                                        {{ $option->sub_bagian }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sub_bagian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tgl_mulai" class="col-form-label">Tanggal Mulai</label>
                                            <input type="date"
                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                id="tgl_mulai" name="tgl_mulai" required
                                                placeholder="Isi nama Sub Bagian" value="{{ old('tgl_mulai') }}">
                                            @error('tgl_mulai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tgl_selesai" class="col-form-label">Tanggal Selesai</label>
                                            <input type="date"
                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                id="tgl_selesai" name="tgl_selesai" required
                                                placeholder="Isi nama Sub Bagian" value="{{ old('tgl_selesai') }}">
                                            @error('tgl_selesai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="floatingInput">Surat Pengantar</label>
                                            <input type="file"
                                                class="form-control @error('surat_pengantar') is-invalid @enderror"
                                                id="surat_pengantar" name="surat_pengantar">
                                            <label for="" class="small text-danger">*) File harus bertipe
                                                .doc/.docx/.pdf/</label>
                                            @error('surat_pengantar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-default mt-4" id="prevStep2">Sebelumnya</button>
                                        <button class="btn btn-primary float-right mt-4"
                                            id="nextStep2">Selanjutnya</button>
                                    </div>
                                    <div id="step3" class="step-content">
                                        <h4 class="mb-4 text-bold d-flex align-items-center"><span
                                                style="color:#007BFF;"><i><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1.5em" height="1.5em" viewBox="0 0 24 24"
                                                        class="mr-2">
                                                        <path fill="currentColor"
                                                            d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19M12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4" />
                                                    </svg></i>Step 3: &nbsp;</span>Pendaftaran Akun
                                        </h4>
                                        <div class="form-group mb-3 ">
                                            <label for="">Alamat Email</label>
                                            <input type="email"
                                                class="form-control p @error('email') is-invalid @enderror"
                                                id="email" name="email"
                                                placeholder="Masukkan alamat email anda" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Password</label>
                                            <input type="password"
                                                class="form-control p @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Masukkan password anda">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group mb-3">
                                            <label for="">Retype Password</label>
                                            <input type="password"
                                                class="form-control p @error('email') is-invalid @enderror"
                                                id="confirmPassword" name="password"
                                                placeholder="Masukkan password anda">
                                        </div> --}}
                                        <button class="btn btn-default mt-4" id="prevStep3">Sebelumnya</button>
                                        <button type="submit"
                                            class="btn btn-primary btn-login float-right mt-4"><i><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                    viewBox="0 0 32 32" class="mr-2">
                                                    <path fill="currentColor"
                                                        d="M26 30H14a2 2 0 0 1-2-2v-3h2v3h12V4H14v3h-2V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v24a2 2 0 0 1-2 2" />
                                                    <path fill="currentColor"
                                                        d="M14.59 20.59L18.17 17H4v-2h14.17l-3.58-3.59L16 10l6 6l-6 6z" />
                                                </svg></i>Daftar</button>
                                    </div>
                                </form>


                                <footer class="text-center" style="margin-top: 90px;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="template/plugins/select2/js/select2.full.min.js"></script>
    <script>
        //tidak bisa menggunakan enter
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('registerForm');
            form.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
        });

        // function checkPassword() {
        //     var password = document.getElementById("password").value;
        //     var confirmPassword = document.getElementById("confirmPassword").value;

        //     if (password !== confirmPassword) {
        //         // alert("Password and confirm password do not match!");
        //         <div class="invalid-feedback">Password tidak sama</div>
        //     }
        // }


        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
        $(document).ready(function() {
            // Next Button Step 1
            $("#nextStep1").click(function(e) {
                e.preventDefault();
                $('#step1-tab').removeClass('active');
                $('#step2-tab').addClass('active');
                $('#step1').removeClass('active show');
                $('#step2').addClass('active show');
            });

            // Previous Button Step 2
            $("#prevStep2").click(function(e) {
                e.preventDefault();
                $('#step2-tab').removeClass('active');
                $('#step1-tab').addClass('active');
                $('#step2').removeClass('active show');
                $('#step1').addClass('active show');
            });

            // Next Button Step 2
            $("#nextStep2").click(function(e) {
                e.preventDefault();
                $('#step2-tab').removeClass('active');
                $('#step3-tab').addClass('active');
                $('#step2').removeClass('active show');
                $('#step3').addClass('active show');
            });

            // Previous Button Step 3
            $("#prevStep3").click(function(e) {
                e.preventDefault();
                $('#step3-tab').removeClass('active');
                $('#step2-tab').addClass('active');
                $('#step3').removeClass('active show');
                $('#step2').addClass('active show');
            });
        });
    </script>
</body>

</html>
