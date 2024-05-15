@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <a href="#" class="btn btn-outline-primary float-right" type="button" data-toggle="modal"
                            data-target="#tambahdata"><i><svg xmlns="http://www.w3.org/2000/svg" width="1.2em"
                                    height="1.2em" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M16 3C8.832 3 3 8.832 3 16s5.832 13 13 13s13-5.832 13-13S23.168 3 16 3m0 2c6.087 0 11 4.913 11 11s-4.913 11-11 11S5 22.087 5 16S9.913 5 16 5m-1 5v5h-5v2h5v5h2v-5h5v-2h-5v-5z" />
                                </svg></i> Tambah Data</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Ketua</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Universitas</th>
                                            <th scope="col">Fakultas</th>
                                            <th scope="col">Prodi</th>
                                            <th scope="col">Tgl. Mulai</th>
                                            <th scope="col">Tgl. Selesai</th>
                                            <th scope="col">Dinas</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                        @endphp
                                        @foreach ($magang as $d)
                                            <tr>
                                                <th scope="row">{{ $x++ }}</th>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>{{ $d->detail['universitas'] }}</td>
                                                <td>{{ $d->detail['fakultas'] }}</td>
                                                <td>{{ $d->detail['prodi'] }}</td>
                                                <td>{{ $d->detail['tgl_mulai'] }}</td>
                                                <td>{{ $d->detail['tgl_selesai'] }}</td>
                                                <td>{{ $d->dinas['dinas'] }}</td>
                                                <td>
                                                    @if ($d->status == 1)
                                                    <span class="badge badge-success">Aktif</span>
                                                    @else
                                                    <span class="badge badge-warning">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-primary" type="button"
                                                        data-toggle="modal" data-target="#editdata{{ $x }}" title="detail">Detail</button>
                                                </td>
                                            </tr>
                                           
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
