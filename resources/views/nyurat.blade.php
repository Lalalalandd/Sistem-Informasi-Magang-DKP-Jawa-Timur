<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penerimaan DKP</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Grotesk:wght@300..700&family=Ubuntu&display=swap"
        rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
    <style>
        * {
            font-family: "Space Grotesk", sans-serif;
        }

        body {
            background: url('/template/img/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;

        }

        .p {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-4">
                <img src="template/img/dkp.png" alt="" class="mt-4 mb-2 mx-auto d-block img-fluid">
            </div>
            <div class="col-md-12 mt-4">
                <div class="card card-primary card-outline p">
                    <div class="card-body">
                        <h5 class=" mb-4"><b>Penerimaan Magang Dinas Kelautan
                                Provinsi Jawa Timur</b></h5>

                        <div class="card-text row">
                            <div class="col-sm-12">
                                <label for="">Status Penerimaan:</label>
                                @if ($user->detail['penerimaan'] == 'diterima')
                                    <span class="badge badge-success">Selamat, anda diterima!</span>
                                @elseif ($user->detail['penerimaan'] == 'ditolak')
                                    <span class="badge badge-danger">Maaf, Pengajuan anda kami tolak</span>
                                @elseif ($user->detail['penerimaan'] == 'diproses')
                                    <span class="badge badge-info">Masih proses pengajuan</span>
                                @endif
                                
                            </div>
                            <div class="col-sm-12">
                                <label for="">Surat Balasan:</label>
                                @if ($user->detail['surat_balasan'] == null)
                                    <span class="badge badge-warning">Masih proses pengajuan</span>
                                @else
                                    <iframe
                                        src="{{ url(Storage::disk('public')->url($user->detail['surat_balasan'])) }}"
                                        frameborder="0" style="width:100%;min-height:440px;"></iframe>
                                @endif

                            </div>

                            <div class="col-sm-6">
                                <label for="">Nama Ketua Kelompok:</label>
                                <span class="">{{ $user->name }}</span>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Universitas:</label>
                                <span class="">{{ $user->detail['universitas'] }}</span>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Periode Magang:</label>
                                <span class="">{{ $user->detail['tgl_mulai'] }} s.d.
                                    {{ $user->detail['tgl_selesai'] }}</span>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Dinas:</label>
                                <span class="">{{ $dinas->dinas }}</span>
                            </div>
                        </div>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="card-link btn btn-primary float-right p" type="submit"><i
                                    class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M16.62 2.99a1.25 1.25 0 0 0-1.77 0L6.54 11.3a.996.996 0 0 0 0 1.41l8.31 8.31c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.38 12l7.25-7.25c.48-.48.48-1.28-.01-1.76" />
                                    </svg></i>Kembali</button>
                        </form>
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
</body>

</html>
