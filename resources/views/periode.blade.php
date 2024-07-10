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
                                            <th scope="col">Nama Periode</th>
                                            <th scope="col">Tanggal Mulai</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Kuota</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                            use Carbon\Carbon;
                                        @endphp
                                        @foreach ($periode as $d)
                                            <tr>
                                                <th scope="row">{{ $x++ }}</th>
                                                <td><?= $d->nama_periode ?></td>
                                                <td>{{ Carbon::parse($d->tanggal_mulai)->format('d M Y') }}</td>
                                                <td>{{ Carbon::parse($d->tanggal_selesai)->format('d M Y') }}</td>
                                                <td><?= $d->kuota ?></td>
                                                <td>
                                                    @if ($d->status === 'aktif')
                                                        <span class="bg-success label">Aktif</span>
                                                    @elseif ($d->status === 'penuh')
                                                        <span class="bg-warning label">Penuh</span>
                                                    @elseif ($d->status === 'tidak aktif')
                                                        <span class="bg-danger label">Tidak Aktif</span>
                                                    @endif
                                                </td>
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
                                                        <form action="/periodemagang/{{ $d->id }}" method="POST"
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
                                            <div class="modal fade" id="editdata{{ $x }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Periode Magang</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="periodemagang/{{ $d->id }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-3">
                                                                        <label for="nama_periode"
                                                                            class="col-form-label">Nama Periode
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('nama_periode') is-invalid @enderror"
                                                                            id="nama_periode" name="nama_periode" required
                                                                            value="{{ $d->nama_periode }}">
                                                                        @error('nama_periode')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_mulai"
                                                                            class="col-form-label">Tanggal Mulai</label>
                                                                        <input type="date"
                                                                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                                            id="tanggal_mulai" name="tanggal_mulai" required
                                                                            placeholder="Isi nama periode magang"
                                                                            value="{{ $d->tanggal_mulai }}">
                                                                        @error('tanggal_mulai')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_selesai"
                                                                            class="col-form-label">Tanggal Selesai</label>
                                                                        <input type="date"
                                                                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                                            id="tanggal_selesai" name="tanggal_selesai"
                                                                            required placeholder="Isi nama periode magang"
                                                                            value="{{ $d->tanggal_selesai }}">
                                                                        @error('tanggal_selesai')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="kuota" class="col-form-label">Kuota
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('kuota') is-invalid @enderror"
                                                                            id="kuota" name="kuota" required
                                                                            value="{{ $d->kuota }}">
                                                                        @error('kuota')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="status"
                                                                            class="col-form-label">Status</label>
                                                                        <select class="form-select"
                                                                            style="width: 100%;" name="status"
                                                                            id="status">
                                                                            <option value="aktif"
                                                                                {{ $d->status == 'aktif' ? 'selected' : '' }}>
                                                                                Aktif
                                                                            </option>
                                                                            <option value="tidak aktif"
                                                                                {{ $d->status == 'tidak aktif' ? 'selected' : '' }}>
                                                                                Tidak Aktif
                                                                            </option>
                                                                            <option value="penuh"
                                                                                {{ $d->status == 'penuh' ? 'selected' : '' }}>
                                                                                Penuh
                                                                            </option>
                                                                        </select>

                                                                    </div>
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
                        <h4 class="modal-title">Tambah Periode Magang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/periodemagang" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_periode" class="col-form-label">Nama Periode:</label>
                                <input type="text" class="form-control @error('nama_periode') is-invalid @enderror"
                                    id="nama_periode" name="nama_periode" required placeholder="Isi nama periode magang"
                                    value="{{ old('nama_periode') }}">
                                @error('nama_periode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="col-form-label">Tanggal Mulai:</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    id="tanggal_mulai" name="tanggal_mulai" required
                                    placeholder="Isi nama periode magang" value="{{ old('tanggal_mulai') }}">
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="col-form-label">Tanggal Selesai:</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                    id="tanggal_selesai" name="tanggal_selesai" required
                                    placeholder="Isi nama periode magang" value="{{ old('tanggal_selesai') }}">
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kuota" class="col-form-label">Kuota:</label>
                                <input type="text" class="form-control @error('kuota') is-invalid @enderror"
                                    id="kuota" name="kuota" required placeholder="Kuota anda"
                                    value="{{ old('kuota') }}">
                                @error('kuota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-select" style="width: 100%;" name="status" id="status">
                                        <option value="aktif">
                                            Aktif
                                        </option>
                                        <option value="tidak aktif">
                                            Tidak Aktif
                                        </option>
                                        <option value="penuh">
                                            Penuh
                                        </option>
                                    </select>

                                </div>
                            </div>
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
