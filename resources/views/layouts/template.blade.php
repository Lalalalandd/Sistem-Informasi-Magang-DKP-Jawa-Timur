<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tittle }} • CIIS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css?v=3.2.0">
    <style>
        * {
            font-family: "Ubuntu", sans-serif;

        }

        .sidebar-dark-primary {
            background-color: #212833;
        }

        [class*="sidebar-dark"] .user-panel {
            border-bottom: 0px solid #4f5962;
        }

        .gambar {
            float: none !important;
            margin-left: 28% !important;
        }

        .card {
            border-radius: 8px;
        }

        .p:hover {
            background-color: #c72f3e !important;
        }

        .brand-link {
            border-bottom: none !important;
        }

        .pengguna {
            border: #f4f6f9 1px solid;
        }

        .btn {
            border-radius: 11px !important;
        }

        .content-wrapper {
            background-color: rgb(252, 252, 252) !important;
        }

        .label{
          padding: 8px;
          border-radius: 6px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <h4 class="ml-2">{{ $tittle }}</h4>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> --}}
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (auth()->user()->image == null)
                            <img src="template/img/user-image.png" class="user-image img-circle elevation-1 pengguna"
                                alt="User Image">
                        @else
                            <img src="{{ auth()->user()->image }}" class="user-image img-circle elevation-1"
                                alt="User Image">
                        @endif
                        <span class="d-none d-md-inline"> {{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            @if (auth()->user()->image == null)
                                <img src="template/img/user-image.png" class="img-circle elevation-2" alt="User Image">
                            @else
                                <img src="{{ auth()->user()->image }}" class="img-circle elevation-2" alt="User Image">
                            @endif
                            <p>
                                {{ auth()->user()->name }}
                                <small> {{ auth()->user()->dinas['dinas'] }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer d-flex justify-content-between">
                            <a href="#" class="btn btn-default">Profile</a>
                            <form action="/logout" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-outline-danger btn-flat"
                                    style="margin-left: 88px;">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-3">
            <!-- Brand Logo -->
            <a href="" class="brand-link" style="background-color: #212833">
                <img src="template/dist/img/logo.png" alt="CIIS Logo" class="brand-image gambar">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="template/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-truncate"
                            style="max-width: 140px;">{{ auth()->user()->name }}</a>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                @if (auth()->user()->role == 'admin')
                    @include('layouts.adminsidebar')
                @elseif(auth()->user()->role == 'pegawai')
                    @include('layouts.pegawaisidebar')
                @elseif(auth()->user()->role == 'mahasiswa')
                    @include('layouts.mahasiswasidebar')
                @endif


                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        @yield('content')



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        {{-- <footer class="main-footer small">
    <strong>Copyright &copy; 2024 <a href="beranda">CIIS</a>.</strong>
    All rights reserved.
   
  </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="template/dist/js/adminlte.js"></script>
    <!-- bs-custom-file-input -->
    <script src="template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="template/plugins/chart.js/Chart.min.js"></script>
    <script src="template/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        })
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

</html>
