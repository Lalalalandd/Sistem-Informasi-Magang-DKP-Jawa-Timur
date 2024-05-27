@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                       <h5>Pendaftar Magang</h5>
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
                                            <th scope="col">Penerimaan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            use Carbon\Carbon;
                                        @endphp
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
                                                <td>{{ Carbon::parse($d->detail['tgl_mulai'])->format('d M Y') }}</td>
                                                <td>{{ Carbon::parse($d->detail['tgl_selesai'])->format('d M Y') }}</td>
                                                <td>{{ $d->dinas['dinas'] }}</td>
                                                <td>
                                                    @if ($d->status == 1)
                                                        <span class="badge badge-success">Diterima</span>
                                                    @else
                                                        <span class="badge badge-warning">Belum Diterima</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-primary" type="button"
                                                        data-toggle="modal" data-target="#detail{{ $x }}"
                                                        title="detail">Detail</button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="detail{{ $x }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Detail Pendaftar Magang</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/pegawai/{{ $d->id }}" method="POST">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="name"
                                                                            class="col-form-label">Nama</label>
                                                                        <p> {{ $d->name }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="email"
                                                                            class="col-form-label">Email</label>
                                                                        <p>{{ $d->email }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="name"
                                                                            class="col-form-label">Universitas</label>
                                                                        <p> {{ $d->detail->universitas }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="email" class="col-form-label">Program
                                                                            Studi</label>
                                                                        <p>{{ $d->detail->prodi }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="email" class="col-form-label">Tanggal
                                                                            Mulai</label>
                                                                        <p>{{ Carbon::parse($d->detail->tgl_mulai)->format('d M Y') }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="email" class="col-form-label">Tanggal
                                                                            Selesai</label>
                                                                        <p>{{ Carbon::parse($d->detail->tgl_selesai)->format('d M Y') }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="email"
                                                                            class="col-form-label">Dinas</label>
                                                                        <p>{{ $d->dinas->dinas }}</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="email" class="col-form-label">Sub
                                                                            Bagian</label>
                                                                        <p>{{ $d->detail->sub_bagian }}</p>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        {{-- <label for="email"
                                                                            class="col-form-label">Surat Balasan</label>
                                                                            <input type="file"
                                                                                class="custom-file-input @error('surat_balasan') is-invalid @enderror"
                                                                                id="surat_balasan" name="surat_balasan">
                                                                            <label for="" class="small text-danger">*) File harus bertipe
                                                                                .doc/.docx/.pdf/</label> --}}

                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">File input</label>
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file"
                                                                                        class="custom-file-input"
                                                                                        id="exampleInputFile">
                                                                                    <label class="custom-file-label"
                                                                                        for="exampleInputFile">Choose
                                                                                        file</label>
                                                                                </div>
                                                                                <div class="input-group-append">
                                                                                    <span
                                                                                        class="input-group-text">Upload</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="status"
                                                                            class="col-form-label">Penerimaan</label>
                                                                        <select class="form-control select2bs4"
                                                                            style="width: 100%;" name="status"
                                                                            id="status">
                                                                            <option value="1"
                                                                                {{ $d->status == 1 ? 'selected' : '' }}>
                                                                                Diterima</option>
                                                                            <option value="0"
                                                                                {{ $d->status == 0 ? 'selected' : '' }}>
                                                                                Belum
                                                                                Diterima</option>
                                                                        </select>
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
