@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        Daftar Tugas
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
                                            <th scope="col">Tugas</th>
                                            <th scope="col">Tgl. Diberikan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                        @endphp
                                        @foreach ($tugas as $d)
                                            <tr>
                                                <th scope="row">{{ $x++ }}</th>
                                                <td>{{ $d->tugas }}</td>
                                                <td>{{ $d->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    @if ($d->status == 1)
                                                        <button class="btn btn-outline-success">Sudah Dikerjakan</button>
                                                    @else
                                                        <button class="btn btn-outline-secondary">Belum Dikerjakan</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-primary" type="button"
                                                        data-toggle="modal" data-target="#editdata{{ $x }}"><i
                                                            class="mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="1em" height="1em" viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="m29.663 482.25l.087.087a24.847 24.847 0 0 0 17.612 7.342a25.178 25.178 0 0 0 8.1-1.345l142.006-48.172l272.5-272.5A88.832 88.832 0 0 0 344.334 42.039l-272.5 272.5l-48.168 142.002a24.844 24.844 0 0 0 5.997 25.709m337.3-417.584a56.832 56.832 0 0 1 80.371 80.373L411.5 180.873L331.127 100.5ZM99.744 331.884L308.5 123.127l80.373 80.373l-208.757 208.756l-121.634 41.262Z" />
                                                            </svg></i>Detail</button>&nbsp;
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editdata{{ $x }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Detail Tugas</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="tugas/kerjakan/{{ $d->id }}" method="POST">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="subbagian"
                                                                                class="col-form-label">Tugas
                                                                            </label>
                                                                            <span>{{ $d->tugas }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="subbagian"
                                                                                class="col-form-label">Tgl. Dibuat
                                                                            </label>
                                                                            <span>{{ $d->created_at->format('d M Y H:i') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="subbagian"
                                                                                class="col-form-label">Tgl. Dikumpulkan
                                                                            </label>
                                                                            <span>{{ $d->created_at->format('d M Y H:i') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label for="status"
                                                                            class="col-form-label">Status</label>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="form-group clearfix">
                                                                            <div class="icheck-primary ">
                                                                                <input type="radio" id="radioPrimary1"
                                                                                    value="0" name="status"
                                                                                    {{ $d->status == 0 ? 'checked' : '' }}>
                                                                                <label for="radioPrimary1">
                                                                                    Belum Dikerjakan
                                                                                </label>
                                                                            </div>
                                                                            <div class="icheck-primary d-inline">
                                                                                <input type="radio" id="radioPrimary2"
                                                                                    value="1" name="status"
                                                                                    {{ $d->status == 1 ? 'checked' : '' }}>
                                                                                <label for="radioPrimary2">
                                                                                    Sudah Dikerjakan
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class=" modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
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
