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
                                            <th class="text-center">No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Dinas</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                        @endphp
                                        @foreach ($user as $d)
                                            <tr>
                                                <td scope="row" class="text-center">{{ $x++ }}</td>
                                                <td class="align-middle"> {{ $d->name }} </td>
                                                <td class="align-middle"> {{ $d->email }} </td>
                                                <td class="align-middle"> {{ $d->dinas['dinas'] }} </td>
                                                <td class="align-middle"> {{ $d->role }} </td>
                                                <td class="align-middle">
                                                    @if ($d->status == 1)
                                                        <span class="bg-success label">Aktif</span>
                                                    @else
                                                        <span class="bg-secondary label">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-warning" type="button"
                                                        data-toggle="modal" data-target="#editdata<?= $x ?>"><i
                                                            class="mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="1em" height="1em" viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="m29.663 482.25l.087.087a24.847 24.847 0 0 0 17.612 7.342a25.178 25.178 0 0 0 8.1-1.345l142.006-48.172l272.5-272.5A88.832 88.832 0 0 0 344.334 42.039l-272.5 272.5l-48.168 142.002a24.844 24.844 0 0 0 5.997 25.709m337.3-417.584a56.832 56.832 0 0 1 80.371 80.373L411.5 180.873L331.127 100.5ZM99.744 331.884L308.5 123.127l80.373 80.373l-208.757 208.756l-121.634 41.262Z" />
                                                            </svg></i>Edit</button>
                                                    <form action="/pegawai/{{ $d->id }}" method="POST"
                                                        class="d-inline">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-outline-danger" type="submit"
                                                            onclick="return confirm('Apakah anda yakin?')"><i
                                                                class="mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                                                </svg></i>Hapus</button>
                                                    </form>
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
                                                        <form action="/pegawai/{{ $d->id }}" method="POST">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="name"
                                                                        class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        value="{{ $d->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email"
                                                                        class="col-form-label">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        id="email" name="email"
                                                                        value="{{ $d->email }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password"
                                                                        class="col-form-label">Password</label>
                                                                    <input type="text" class="form-control"
                                                                        id="password" name="password"
                                                                        value="{{ $d->password }}">
                                                                </div>
                                                                <div class=" mb-3">
                                                                    <label for="tugas"
                                                                        class="col-form-label">Dinas</label>
                                                                    <select
                                                                        class="form-control select2 select2-purple p @error('dinas_id') is-invalid @enderror"
                                                                        data-dropdown-css-class="select2-purple"
                                                                        style="width: 100%;" name="dinas_id"
                                                                        id="select2_edit" required>
                                                                        <option selected disabled>Pilih Dinas</option>
                                                                        @foreach ($dinas as $option)
                                                                            <option value="{{ $option->id }}"
                                                                                {{ $option->dinas == $d->dinas['dinas'] ? 'selected' : '' }}>
                                                                                {{ $option->dinas }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('dinas_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status"
                                                                        class="col-form-label">Status</label>
                                                                    <select class="form-select" style="width: 100%;"
                                                                        name="status" id="status">
                                                                        <option value="1"
                                                                            {{ $d->status == 1 ? 'selected' : '' }}>Aktif
                                                                        </option>
                                                                        <option value="0"
                                                                            {{ $d->status == 0 ? 'selected' : '' }}>Tidak
                                                                            Aktif</option>
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
                            <div class="card-footer clearfix" style="max-height: 65px !important; {{ $user->hasPages() ? '' : 'height: 45px !important;' }}">
                                {{ $user->links('vendor.pagination.bootstrap-5') }}
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
                    <form action="/pegawai" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="col-form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" required placeholder="Isi nama pegawai/dinas"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" required placeholder="Isi email pegawai/dinas"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required placeholder="Masukkan Password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="tugas" class="col-form-label">Dinas</label>
                                <select
                                    class="form-control select2 select2-purple p @error('dinas_id') is-invalid @enderror"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;" name="dinas_id"
                                    id="select2" required>
                                    <option selected disabled>Pilih Dinas</option>
                                    @foreach ($dinas as $option)
                                        <option value="{{ $option->id }}">
                                            {{ $option->dinas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('dinas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" class="form-control" id="role" name="role" value="pegawai">
                            <input type="hidden" class="form-control" id="status" name="status" value="1">
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif
            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif
        });
    </script>
@endpush
