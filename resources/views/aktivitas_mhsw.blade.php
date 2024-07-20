@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   


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
                                            <th class="text-center">No.</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Aktivitas</th>
                                            <th>Bukti</th>
                                            <th>Presensi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                            use Carbon\Carbon;
                                        @endphp
                                        @foreach ($logbook as $d)
                                            <tr>
                                                <td scope="row" class="text-center align-middle">
                                                    <dt>{{ $x++ }}</dt>
                                                </td>
                                                <td class="align-middle">{{ $d->user['name'] }}</td>
                                                <td class="align-middle">{{ Carbon::parse($d->tanggal)->format('d M Y') }}</td>
                                                <td class="align-middle">{{ $d->aktivitas }}</td>
                                                <td class="align-middle">{{ $d->bukti }}</td>
                                                <td class="align-middle">{{ $d->presensi }}</td>
                                                <td>
                                                    <div class="d-flex d-inline">
                                                        <button class="btn btn-outline-warning mr-1" type="button"
                                                            title="Edit" data-toggle="modal"
                                                            data-target="#editdata<?= $x ?>"><i><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                    height="1em" viewBox="0 0 512 512">
                                                                    <path fill="currentColor"
                                                                        d="m29.663 482.25l.087.087a24.847 24.847 0 0 0 17.612 7.342a25.178 25.178 0 0 0 8.1-1.345l142.006-48.172l272.5-272.5A88.832 88.832 0 0 0 344.334 42.039l-272.5 272.5l-48.168 142.002a24.844 24.844 0 0 0 5.997 25.709m337.3-417.584a56.832 56.832 0 0 1 80.371 80.373L411.5 180.873L331.127 100.5ZM99.744 331.884L308.5 123.127l80.373 80.373l-208.757 208.756l-121.634 41.262Z" />
                                                                </svg></i></button>
                                                        <form action="/subbagian/{{ $d->id }}" method="POST"
                                                            class="d-inline">
                                                            {{ csrf_field() }}
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-outline-danger" type="submit"
                                                                title="Hapus"
                                                                onclick="return confirm('Apakah anda yakin?')"><i><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="1.2em"
                                                                        height="1.2em" viewBox="0 0 24 24">
                                                                        <path fill="none" stroke="currentColor"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                                                    </svg></i></button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>

                                            <!-- /.modal EDIT data -->
                                            <div class="modal fade" id="editdata<?= $x ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data Sub Bagian</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/subbagian/{{ $d->id }}" method="POST">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="subbagian" class="col-form-label">Sub
                                                                        Bagian:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="subbagian" name="sub_bagian"
                                                                        value="{{ $d->sub_bagian }}">
                                                                </div>
                                                            </div>
                                                            <div class=" modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-warning">Edit
                                                                    Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal EDIT data -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix"
                                style="max-height: 65px !important; {{ $logbook->hasPages() ? '' : 'height: 45px !important;' }}">
                                {{ $logbook->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- /.modal tambah data -->
        <div class="modal fade" id="tambahdata">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Sub Bagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/subbagian" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                           
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal tambah data -->
    </div>
@endsection
