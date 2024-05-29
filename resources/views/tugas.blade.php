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
                                            <th scope="col">Tugas</th>
                                            <th scope="col">Tanggal Diberikan</th>
                                            <th scope="col">Nama</th>
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
                                                <td>{{ $d->tgl_diberikan->format('d M Y H:i') }}</td>
                                                <td>{{ $d->tgl_dikumpulkan->format('d M Y H:i') }}</td>
                                                <td>{{ $d->user['name'] }}</td>

                                                <td>
                                                    @if ($d->status == 1)
                                                        <span class="badge badge-success">Selesai</span>
                                                    @else
                                                        <span class="badge badge-warning">Belum</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex d-inline">
                                                        <button class="btn btn-outline-warning mr-1" title="Edit"
                                                            type="button" data-toggle="modal"
                                                            data-target="#editdata{{ $x }}"><i><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                    height="1em" viewBox="0 0 512 512">
                                                                    <path fill="currentColor"
                                                                        d="m29.663 482.25l.087.087a24.847 24.847 0 0 0 17.612 7.342a25.178 25.178 0 0 0 8.1-1.345l142.006-48.172l272.5-272.5A88.832 88.832 0 0 0 344.334 42.039l-272.5 272.5l-48.168 142.002a24.844 24.844 0 0 0 5.997 25.709m337.3-417.584a56.832 56.832 0 0 1 80.371 80.373L411.5 180.873L331.127 100.5ZM99.744 331.884L308.5 123.127l80.373 80.373l-208.757 208.756l-121.634 41.262Z" />
                                                                </svg></i></button>
                                                        <form action="/tugas/{{ $d->id }}" method="POST">
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
                                            <div class="modal fade" id="editdata{{ $x }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data Sub Bagian</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="tugas/{{ $d->id }}" method="POST">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="subbagian" class="col-form-label">Sub
                                                                        Bagian:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="subbagian" name="tugas"
                                                                        value="{{ $d->tugas }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tugas"
                                                                        class="col-form-label">Dinas</label>
                                                                    <select
                                                                        class="form-control select2 select2-purple p @error('dinas') is-invalid @enderror"
                                                                        data-dropdown-css-class="select2-purple"
                                                                        style="width: 100%;" name="dinas"
                                                                        id="select2dinas{{ $x }}">
                                                                        <option selected disabled>Pilih Sub Bagian</option>
                                                                        @foreach ($dinas as $option)
                                                                            <option value="{{ $option->dinas }}"
                                                                                {{ $option->dinas == $d->dinas ? 'selected' : '' }}>
                                                                                {{ $option->dinas }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('dinas')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tugas" class="col-form-label">Sub
                                                                        Bagian</label>
                                                                    <select
                                                                        class="form-control select2 select2-purple p @error('sub_bagian') is-invalid @enderror"
                                                                        data-dropdown-css-class="select2-purple"
                                                                        style="width: 100%;" name="sub_bagian"
                                                                        id="select2subbagian{{ $x }}">
                                                                        <option selected disabled>Pilih Sub Bagian</option>
                                                                        @foreach ($sub_bagian as $option)
                                                                            <option value="{{ $option->sub_bagian }}"
                                                                                {{ $option->sub_bagian == $d->sub_bagian ? 'selected' : '' }}>
                                                                                {{ $option->sub_bagian }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('sub_bagian')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status"
                                                                        class="col-form-label">status</label>
                                                                    <select class="form-control select2bs4"
                                                                        style="width: 100%;" name="status"
                                                                        id="status">
                                                                        <option value="1"
                                                                            {{ $d->status == 1 ? 'selected' : '' }}>Sudah
                                                                            Dikerjakan
                                                                        </option>
                                                                        <option value="0"
                                                                            {{ $d->status == 0 ? 'selected' : '' }}>Belum
                                                                            Dikerjakan
                                                                        </option>
                                                                    </select>
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

        <!-- /.modal tambah data -->
        <div class="modal fade" id="tambahdata">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Tugas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/tugas" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="tugas" class="col-form-label">Tugas</label>
                                    <input type="text" class="form-control @error('tugas') is-invalid @enderror"
                                        id="tugas" name="tugas" required placeholder="Tugas yang ingin diberikan"
                                        value="{{ old('tugas') }}">
                                    @error('tugas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="tugas" class="col-form-label">Mahasiswa</label>
                                    <select
                                        class="form-control select2 select2-purple p @error('user_id') is-invalid @enderror"
                                        data-dropdown-css-class="select2-purple" style="width: 100%;" name="user_id"
                                        id="user">
                                        <option selected disabled>Pilih Mahasiswa</option>
                                        @foreach ($user as $option)
                                            <option value="{{ $option->id }}">
                                                {{ $option->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="tgl_diberikan" class="col-form-label">Tanggal Diberikan</label>
                                    <input type="date" class="form-control @error('tgl_diberikan') is-invalid @enderror"
                                        id="tgl_diberikan" name="tgl_diberikan" required
                                        value="{{ old('tgl_diberikan') }}">
                                    @error('tgl_diberikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="tgl_dikumpulkan" class="col-form-label">Tanggal Dikumpulkan</label>
                                    <input type="date" class="form-control @error('tgl_dikumpulkan') is-invalid @enderror"
                                        id="tgl_dikumpulkan" name="tgl_dikumpulkan" required
                                        value="{{ old('tgl_dikumpulkan') }}">
                                    @error('tgl_dikumpulkan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="dinas_id" id="dinas_id"
                                value="{{ auth()->user()->dinas_id }}">
                            <input type="hidden" name="status" id="status" value="0">
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

    <script>
        $(function() {
            $('.select2').select2()
        })

        $(document).ready(function() {
            $("#select2insidemodal").select2({
                dropdownParent: $("#myModal")
            });
        });
    </script>
@endsection
