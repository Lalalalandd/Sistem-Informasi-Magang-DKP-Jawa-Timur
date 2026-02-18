<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tittle ?? 'Login' }}</title>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Twitter Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: flex;
            min-height: 600px;
        }

        .login-image {
            background-image: url('template/img/mesh.png');
            /* Fallback */
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            background-size: cover;
            background-position: center;
            width: 50%;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 40px;
            text-align: center;
        }

        .login-image img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .login-image {
                display: flex;
            }
        }

        .login-form {
            width: 100%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .login-form {
                width: 50%;
            }
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
            background-color: white;
        }

        .btn-primary {
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            background: #0d6efd;
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            transform: translateY(-1px);
        }

        .brand-logo {
            width: 80px;
            margin-bottom: 24px;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #212529;
        }

        .subtitle-text {
            color: #6c757d;
            margin-bottom: 32px;
        }

        .footer-text {
            margin-top: auto;
            color: #adb5bd;
            font-size: 12px;
            text-align: center;
            padding-top: 20px;
        }

        .period-alert {
            background: #e7f1ff;
            color: #0d6efd;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 0.9rem;
            margin-bottom: 20px;
            border-left: 4px solid #0d6efd;
        }
    </style>
</head>

<body>

    <div class="container p-0">
        <div class="login-container">
            <div class="login-card">
                <div class="login-image">
                    <img src="template/img/dkp.png" alt="Logo DKP" style="filter: brightness(0) invert(1);">
                    <h3>Sistem Informasi Magang</h3>
                    <p class="mb-0">Dinas Kelautan dan Perikanan Provinsi Jawa Timur</p>
                </div>
                <div class="login-form">
                    <div class="d-md-none text-center mb-4">
                        <img src="template/img/dkp.png" alt="Logo" class="brand-logo">
                    </div>

                    <h1 class="welcome-text">Selamat Datang</h1>
                    <p class="subtitle-text">Silahkan login untuk melanjutkan</p>

                    @php
                    use Carbon\Carbon;
                    @endphp

                    @if ($periode_magang)
                    <div class="period-alert">
                        <i class="fas fa-info-circle me-2"></i>
                        Pendaftaran <strong>{{ $periode_magang['nama_periode'] }}</strong> dibuka:
                        {{ Carbon::parse($periode_magang['tanggal_mulai'])->format('d M') }} -
                        {{ Carbon::parse($periode_magang['tanggal_selesai'])->format('d M Y') }}
                    </div>
                    @endif

                    <form method="post" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary small fw-bold">EMAIL</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="name@example.com" value="{{ old('email') }}" required
                                autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label text-secondary small fw-bold">PASSWORD</label>
                            </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="••••••••" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label text-secondary small" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                            <a href="/register" class="small text-decoration-none fw-bold">Buat Akun Baru</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>
                    </form>

                    <div class="footer-text">
                        &copy; {{ date('Y') }} Centralized Internship Information System
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
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