<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tittle ?? 'CIIS' }} • CIIS</title>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Twitter Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --light-bg: #f3f4f6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
        }

        /* Sidebar Styling */
        .main-sidebar {
            background-color: var(--sidebar-bg) !important;
            box-shadow: none !important;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .brand-link {
            background-color: transparent !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
            padding: 20px 15px !important;
        }

        .brand-text {
            color: white !important;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .nav-sidebar .nav-item .nav-link {
            color: #cbd5e1 !important;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 5px;
        }

        .nav-sidebar .nav-item .nav-link:hover,
        .nav-sidebar .nav-item .nav-link.active {
            background-color: var(--primary-color) !important;
            color: white !important;
            box-shadow: 0 4px 6px -1px rgba(13, 110, 253, 0.2);
        }

        .nav-sidebar .nav-icon {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Navbar Styling */
        .main-header {
            border-bottom: none !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            background-color: white !important;
            padding: 10px 0;
        }

        .navbar-nav .nav-link {
            color: #64748b !important;
            font-weight: 500;
        }

        /* Content Styling */
        .content-wrapper {
            background-color: var(--light-bg) !important;
            padding-top: 20px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 20px;
        }

        .card-title {
            font-weight: 600;
            color: #0f172a;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 8px 16px;
        }

        .user-panel img {
            object-fit: cover;
        }

        .sidebar-user-info {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 15px;
        }

        .sidebar-user-name {
            color: white;
            font-weight: 600;
            display: block;
        }

        .sidebar-user-role {
            color: #94a3b8;
            font-size: 0.85rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <span class="nav-link text-dark fw-bold">{{ $tittle ?? 'Dashboard' }}</span>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- User Dropdown --}}
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="rounded-circle me-2"
                            alt="User Image" style="width: 30px; height: 30px; object-fit: cover;">
                        @else
                        <img src="{{ asset('template/img/user-image.png') }}" class="rounded-circle me-2"
                            alt="User Image" style="width: 30px; height: 30px;">
                        @endif
                        <span class="d-none d-md-inline text-dark">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0"
                        style="border-radius: 12px; padding: 10px;">
                        <li>
                            <div class="px-3 py-2">
                                <p class="mb-0 fw-bold">{{ auth()->user()->name }}</p>
                                <small class="text-muted">{{ auth()->user()->role }}</small>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item rounded" href="/profil"><i
                                    class="fas fa-user me-2 text-secondary"></i> Profile</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item rounded text-danger"><i
                                        class="fas fa-sign-out-alt me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('template/img/dkp.png') }}" alt="CIIS Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8; background: white;">
                <span class="brand-text font-weight-light">CIIS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar User (Optional) -->
                @auth
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-circle elevation-2"
                            alt="User Image" style="width: 34px; height: 34px; object-fit: cover;">
                        @else
                        <img src="{{ asset('template/img/user-image.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                @endauth

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (auth()->check())
                        @if (auth()->user()->role == 'admin')
                        @include('layouts.adminsidebar')
                        @elseif(auth()->user()->role == 'pegawai')
                        @include('layouts.pegawaisidebar')
                        @elseif(auth()->user()->role == 'mahasiswa')
                        @include('layouts.mahasiswasidebar')
                        @endif
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };
    </script>
</body>

</html>