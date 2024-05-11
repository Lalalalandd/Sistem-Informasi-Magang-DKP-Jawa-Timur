@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6 mt-4">
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
                                <div class="callout callout-info">
                                    <label for="">Nama Anggota Kelompok 1 :</label>
                                    <p> {{ $user->detail['nama_kelompok_1'] }} </p>
                                    <label for="">Nama Anggota Kelompok 2 :</label>
                                    <p>{{ $user->detail['nama_kelompok_2'] }}</p>
                                    <label for="">Surat Pengantar :</label>
                                    <a href="storage/{{ $user->detail['surat_pengantar'] }}">peh</a>
                                    <iframe src="{{ url(Storage::disk('public')->url($user->detail['surat_pengantar'])) }}"
                                        frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                    <label for="">Dinas :</label>
                                    <p>{{ $user->detail['dinas_id'] }}</p>
                                    <label for="">Sub Bagian :</label>
                                    <p>{{ $user->detail['sub_bagian_id'] }}</p>
                                    <label for="">Universitas :</label>
                                    <p>{{ $user->detail['universitas'] }}</p>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
