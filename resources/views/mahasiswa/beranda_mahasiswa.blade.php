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

                                    <div class="col-6  d-flex align-items-center border-end">
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <span class="text-muted">Nama Ketua Kelompok</span>
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
                                    <div class="col-4 ml-2 d-flex align-items-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="text-muted ">Universitas:</span>
                                                <h5 class="text-capitalize">{{ $user->detail['universitas']->universitas }}</h5>
                                            </div>
                                            <div class="col-12">
                                                <span class="text-muted ">Fakultas:</span>
                                                <h5 class="text-capitalize">{{ $user->detail['fakultas'] }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <h5 class="my-2">Periode Magang</h5>
                                        <span class="border text-bold d-flex align-items-center justify-content-center"
                                            style="padding: 4px; color: #E96494; border-radius:8px; border:3px solid#E96494 !important;">
                                            <i class="mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M8 13.885q-.31 0-.54-.23t-.23-.54t.23-.539t.54-.23t.54.23t.23.54t-.23.539t-.54.23m4 0q-.31 0-.54-.23t-.23-.54t.23-.539t.54-.23t.54.23t.23.54t-.23.539t-.54.23m4 0q-.31 0-.54-.23t-.23-.54t.23-.539t.54-.23t.54.23t.23.54t-.23.539t-.54.23M5.616 21q-.691 0-1.153-.462T4 19.385V6.615q0-.69.463-1.152T5.616 5h1.769V2.77h1.077V5h7.154V2.77h1V5h1.769q.69 0 1.153.463T20 6.616v12.769q0 .69-.462 1.153T18.384 21zm0-1h12.769q.23 0 .423-.192t.192-.424v-8.768H5v8.769q0 .23.192.423t.423.192" />
                                                </svg>
                                            </i> {{ Carbon::parse($user->detail['tgl_mulai'])->format('d M Y') }} s.d
                                            {{ Carbon::parse($user->detail['tgl_selesai'])->format('d M Y') }}
                                        </span>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <h5 class="my-2 ">Surat Balasan</h5>
                                        <form
                                            action="{{ $user->detail['surat_balasan'] ? Storage::url($user->detail['surat_balasan']) : '#' }}"
                                            method="get" target="_blank">
                                            <button type="submit" class="btn mb-2"
                                                style="width:100%; height:42px; background-color:#E96494 !important; color:white;"
                                                {{ $user->detail['surat_balasan'] == null ? 'disabled' : '' }}>
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em"
                                                        viewBox="0 0 256 256">
                                                        <g fill="currentColor">
                                                            <path d="M208 88h-56V32Z" opacity="0.2" />
                                                            <path
                                                                d="M224 152a8 8 0 0 1-8 8h-24v16h16a8 8 0 0 1 0 16h-16v16a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h32a8 8 0 0 1 8 8M92 172a28 28 0 0 1-28 28h-8v8a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h16a28 28 0 0 1 28 28m-16 0a12 12 0 0 0-12-12h-8v24h8a12 12 0 0 0 12-12m88 8a36 36 0 0 1-36 36h-16a8 8 0 0 1-8-8v-56a8 8 0 0 1 8-8h16a36 36 0 0 1 36 36m-16 0a20 20 0 0 0-20-20h-8v40h8a20 20 0 0 0 20-20M40 112V40a16 16 0 0 1 16-16h96a8 8 0 0 1 5.66 2.34l56 56A8 8 0 0 1 216 88v24a8 8 0 0 1-16 0V96h-48a8 8 0 0 1-8-8V40H56v72a8 8 0 0 1-16 0m120-32h28.69L160 51.31Z" />
                                                        </g>
                                                    </svg>
                                                </i>
                                                Unduh Surat
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="card card-default" style="height: 276px;">
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="">
                                    <div id="carouselExampleIndicators" class="carousel slide mt-3" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                            </li>
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
                                                <img class="d-block w-100" src="template/img/slider-144.jpg"
                                                    height="201px" alt="Fourth slide">
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

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #2574EA !important;">
                                <h3 class="card-title">Tugas Terbaru</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @if ($tugas->isEmpty())
                                        <li class="list-group-item">
                                            <h6>Tugas belum ada</h6>
                                        </li>
                                    @endif
                                    @foreach ($tugas as $d)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <h6>{{ $d->tugas }}</h6>
                                                <small>
                                                    <i>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                                            height="1.5em" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M128 26a102 102 0 1 0 102 102A102.12 102.12 0 0 0 128 26m0 192a90 90 0 1 1 90-90a90.1 90.1 0 0 1-90 90m62-90a6 6 0 0 1-6 6h-56a6 6 0 0 1-6-6V72a6 6 0 0 1 12 0v50h50a6 6 0 0 1 6 6" />
                                                        </svg>
                                                    </i>
                                                    {{ Carbon::parse($d->tgl_dikumpulkan)->format('d M Y') }}
                                                </small>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="" style="color:#2574EA;">
                                            Dinas
                                        </h4>
                                    </div>
                                    <div class="col-7 mt-3 border-end">
                                        <h5>
                                            {{ $dinas->dinas }}
                                        </h5>
                                        <p class="lh-sm text-muted">
                                            {{ $dinas->alamat }}
                                        </p>
                                    </div>
                                    <div class="col-5 mt-3 d-flex justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 style="color:#2574EA;">Sub Bagian</h6>
                                            </div>
                                            <div class="col-12">
                                                <h5>{{ $user->detail['sub_bagian']->sub_bagian }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
