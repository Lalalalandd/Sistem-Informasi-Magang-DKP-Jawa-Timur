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
                                            <th scope="col">Tgl. DiKumpulkan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                            use Carbon\Carbon;
                                        @endphp
                                        @if ($tugas->isEmpty())
                                            <tr>
                                                <td colspan="6">Tugas belum ada</td>
                                            </tr>
                                        @endif
                                        @foreach ($tugas as $d)
                                            <tr>
                                                <th scope="row">{{ $x++ }}</th>
                                                <td>{{ $d->tugas }}</td>
                                                <td>{{ $d->tgl_diberikan }}</td>
                                                <td>{{ $d->tgl_dikumpulkan }}</td>
                                                <td>
                                                    @if ($d->status == 'selesai')
                                                        <span class="label bg-success">Sudah Dikerjakan</span>
                                                    @elseif ($d->status == 'belum')
                                                        <span class="label bg-warning">Belum Dikerjakan</span>
                                                    @else
                                                        <span class="label bg-info">Proses Pengerjaan</span>
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
                                                                            <label for="tugas"
                                                                                class="col-form-label">Tugas
                                                                            </label>
                                                                            <span>{{ $d->tugas }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="lampiran"
                                                                                class="col-form-label">Lampiran
                                                                            </label>
                                                                            @if ($d->lampiran)
                                                                                <div id="preview">
                                                                                    @php
                                                                                        $fileExtension = pathinfo(
                                                                                            $d->lampiran,
                                                                                            PATHINFO_EXTENSION,
                                                                                        );
                                                                                    @endphp

                                                                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                                                                        <img class="container d-flex justify-content-center align-items-center" src="{{ asset('storage/' . $d->lampiran) }}"
                                                                                            style="max-width: 50%;">
                                                                                    @elseif($fileExtension === 'pdf')
                                                                                        <iframe
                                                                                            src="{{ asset('storage/' . $d->lampiran) }}"
                                                                                            style="width: 100%; height: 400px;"></iframe>
                                                                                    @elseif(in_array($fileExtension, ['doc', 'docx']))
                                                                                        <iframe
                                                                                            src="https://docs.google.com/viewer?url={{ asset('storage/' . $d->lampiran) }}&embedded=true"
                                                                                            style="width: 100%; height: 400px;"></iframe>
                                                                                    @else
                                                                                        <p>Tidak bisa menampilkan lampiran
                                                                                            dengan tipe file ini.
                                                                                        </p>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                            @if ($d->lampiran == null)
                                                                                <p class="d-inline mr-4">Tidak ada lampiran
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="subbagian"
                                                                                class="col-form-label">Tgl. Dibuat
                                                                            </label>
                                                                            <span>{{ $d->tgl_diberikan }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="subbagian"
                                                                                class="col-form-label">Tgl. Dikumpulkan
                                                                            </label>
                                                                            <span>{{ $d->tgl_dikumpulkan }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label for="status"
                                                                            class="col-form-label">Status</label>
                                                                            @if ($d->status == "selesai")
                                                                             <p class="label bg-success text-center" style="max-width: 100px">Selesai</p>
                                                                            @elseif($d->status == 'proses')
                                                                            <p class="label bg-info text-center" style="max-width: 100px">Proses</p>
                                                                            @else
                                                                            <p class="label bg-warning text-center" style="max-width: 100px">Belum</p>
                                                                            @endif
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="form-group clearfix">
                                                                            <div class="row">
                                                                                <label for="aksi"
                                                                            class="col-form-label">Aksi</label>
                                                                                <div class="icheck-warning col-12 ">
                                                                                    <input type="radio"
                                                                                        id="radioPrimary1{{ $d->id }}"
                                                                                        value="belum" name="status"
                                                                                        {{ $d->status == 'belum' ? 'checked' : '' }}>
                                                                                    <label
                                                                                        for="radioPrimary1{{ $d->id }}">
                                                                                        Belum Dikerjakan
                                                                                    </label>
                                                                                </div>
                                                                                <div class="icheck-info col-12">
                                                                                    <input type="radio"
                                                                                        id="radioPrimary2{{ $d->id }}"
                                                                                        value="proses" name="status"
                                                                                        {{ $d->status == 'proses' ? 'checked' : '' }}>
                                                                                    <label
                                                                                        for="radioPrimary2{{ $d->id }}">
                                                                                        Proses Pengerjaan
                                                                                    </label>
                                                                                </div>
                                                                                <div class="icheck-success col-12">
                                                                                    <input type="radio"
                                                                                        id="radioPrimary3{{ $d->id }}"
                                                                                        value="selesai" name="status"
                                                                                        {{ $d->status == 'selesai' ? 'checked' : '' }}>
                                                                                    <label
                                                                                        for="radioPrimary3{{ $d->id }}">
                                                                                        Selesai Dikerjakan
                                                                                    </label>
                                                                                </div>
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
