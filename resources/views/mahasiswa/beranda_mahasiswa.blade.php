@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <marquee direction="left" scrollamount="8">Jangan lupa mengisi aktivitas harian setiap hari ☺
                        </marquee>
                    </div>
                    <div class="col-6">
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <span> Tanggal: {{ Carbon::today()->format('d M Y') }}</span>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="ml-2" style="color:#2574EA;">
                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em"
                                                    viewBox="0 0 256 256">
                                                    <path fill="currentColor"
                                                        d="M117.25 157.92a60 60 0 1 0-66.5 0a95.83 95.83 0 0 0-47.22 37.71a8 8 0 1 0 13.4 8.74a80 80 0 0 1 134.14 0a8 8 0 0 0 13.4-8.74a95.83 95.83 0 0 0-47.22-37.71M40 108a44 44 0 1 1 44 44a44.05 44.05 0 0 1-44-44m210.14 98.7a8 8 0 0 1-11.07-2.33A79.83 79.83 0 0 0 172 168a8 8 0 0 1 0-16a44 44 0 1 0-16.34-84.87a8 8 0 1 1-5.94-14.85a60 60 0 0 1 55.53 105.64a95.83 95.83 0 0 1 47.22 37.71a8 8 0 0 1-2.33 11.07" />
                                                </svg>
                                            </i>
                                            Informasi Magang
                                        </h4>
                                    </div>

                                    <div class="col-6 border-end">
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <span class="text-muted ">Nama Ketua Kelompok</span>
                                                <h5 class="text-capitalize">{{ $user->name }}</h5>
                                            </div>
                                            @if ($user->detail['nama_kelompok_1'] != null)
                                                <div class="col-12">
                                                    <span class="text-muted ">Nama Anggota Kelompok 1:</span>
                                                    <h5 class="text-capitalize">{{ $user->detail['nama_kelompok_1'] }}</h5>
                                                </div>
                                            @endif
                                            @if ($user->detail['nama_kelompok_2'] != null)
                                                <div class="col-12">
                                                    <span class="text-muted ">Nama Anggota Kelompok 2:</span>
                                                    <h5 class="text-capitalize">{{ $user->detail['nama_kelompok_2'] }}</h5>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4 ml-2">
                                        <div class="col-12 mt-2">
                                            <span class="text-muted ">Universitas:</span>
                                            <h5 class="text-capitalize">{{ $user->detail['universitas'] }}</h5>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-muted ">Fakultas:</span>
                                            <h5 class="text-capitalize">{{ $user->detail['fakultas'] }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-outline-primary" style="border-color:#E96494 !important; color:#E96494 !important;">
                                            {{ $user->detail['tgl_mulai'] }}
                                        </a>
                                    </div>
                                </div>
                                {{-- <div class="callout callout-info">
                                    @if ($user->detail['nama_kelompok_1'] != null)
                                        <label for="">Nama Anggota Kelompok 1 :</label>
                                        <p> {{ $user->detail['nama_kelompok_1'] }} </p>
                                    @endif
                                    @if ($user->detail['nama_kelompok_2'] != null)
                                        <label for="">Nama Anggota Kelompok 2 :</label>
                                        <p> {{ $user->detail['nama_kelompok_2'] }} </p>
                                    @endif
                                    <label for="">Surat Pengantar :</label>
                                    <iframe src="{{ url(Storage::disk('public')->url($user->detail['surat_pengantar'])) }}"
                                        frameborder="0" style="width:100%;min-height:440px;"></iframe>

                                    <label for="">Surat Balasan :</label>
                                    <iframe src="{{ url(Storage::disk('public')->url($user->detail['surat_balasan'])) }}"
                                        frameborder="0" style="width:100%;min-height:440px;"></iframe>
                                    <label for="">Dinas :</label>
                                    <p>{{ $user->dinas['dinas'] }}</p>
                                    <label for="">Sub Bagian :</label>
                                    <p>{{ $user->detail['sub_bagian'] }}</p>
                                    <label for="">Universitas :</label>
                                    <p>{{ $user->detail['universitas'] }}</p>
                                </div> --}}

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                            viewBox="0 0 256 256">
                                            <path fill="currentColor"
                                                d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m-4 48a12 12 0 1 1-12 12a12 12 0 0 1 12-12m12 112a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 0 16" />
                                        </svg></i>
                                    Info
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="template/img/slider-141.jpg" height="201px"
                                                alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="template/img/slider-142.jpg" height="201px"
                                                alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="template/img/slider-143.jpg" height="201px"
                                                alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="template/img/slider-144.jpg" height="201px"
                                                alt="Fourth slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-custom-icon" aria-hidden="true">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
