@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                </div><!-- /.row -->
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
                                                    <th>Nama Ketua</th>
                                                    <th>Universitas</th>
                                                    <th>Tgl. Mulai</th>
                                                    <th>Tgl. Selesai</th>
                                                    <th>Penerimaan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    use Carbon\Carbon;
                                                    $x = 1;
                                                @endphp
                                                @if ($magang->isEmpty())
                                                    <tr>
                                                        <td colspan="11" class="text-center">Data mahasiswa magang tidak
                                                            ada</td>
                                                    </tr>
                                                @endif
                                                @foreach ($magang as $d)
                                                    <tr>
                                                        <td scope="row" class="text-center align-middle">
                                                            <dt>{{ $x++ }}</dt>
                                                        </td>
                                                        <td class="align-middle">{{ $d->name }}</td>
                                                        <td class="align-middle">{{ $d->detail['universitas']->universitas }}</td>
                                                        <td class="align-middle">
                                                            {{ Carbon::parse($d->detail['tgl_mulai'])->format('d M Y') }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ Carbon::parse($d->detail['tgl_selesai'])->format('d M Y') }}
                                                        </td>
                                                        <td class="align-middle">
                                                            @if ($d->detail['penerimaan'] === 'diterima')
                                                                <span class="bg-success label">Diterima</span>
                                                            @elseif ($d->detail['penerimaan'] === 'ditolak')
                                                                <span class="bg-danger label">Ditolak</span>
                                                            @elseif ($d->detail['penerimaan'] === 'diproses')
                                                                <span class="bg-info label">Diproses</span>
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
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="/magang/{{ $d->id }}" method="POST"
                                                                    enctype="multipart/form-data">
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
                                                                                <p> {{ $d->detail->universitas->universitas }}</p>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="email"
                                                                                    class="col-form-label">Program
                                                                                    Studi</label>
                                                                                <p>{{ $d->detail->prodi }}</p>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="email"
                                                                                    class="col-form-label">Tanggal
                                                                                    Mulai</label>
                                                                                <p>{{ Carbon::parse($d->detail->tgl_mulai)->format('d M Y') }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="email"
                                                                                    class="col-form-label">Tanggal
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
                                                                                <label for="email"
                                                                                    class="col-form-label">Sub
                                                                                    Bagian</label>
                                                                                <p>{{ $d->detail->sub_bagian['sub_bagian'] }}</p>
                                                                            </div>
                                                                            @if ($d->detail->surat_balasan == null)
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputFile"
                                                                                            class="col-form-label">Surat
                                                                                            Balasan </label>
                                                                                        <p><span class="bg-info label">Masih
                                                                                                Diproses</span></p>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputFile"
                                                                                            class="col-form-label">Surat
                                                                                            Balasan</label>
                                                                                        <p>
                                                                                            <a href="{{ Storage::url($d->detail->surat_balasan) }}"
                                                                                                target="_blank"><span
                                                                                                    class="bg-indigo label">Lihat
                                                                                                    Surat
                                                                                                    Balasan</span></a>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            @endif

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="status"
                                                                                        class="col-form-label">Penerimaan</label>
                                                                                    @if ($d->detail['penerimaan'] === 'diterima')
                                                                                       <p> <span
                                                                                                class="bg-success label">Diterima</span>
                                                                                            </p>
                                                                                    @elseif($d->detail['penerimaan'] === 'diproses')
                                                                                    <p><span class="bg-info label">Proses
                                                                                                Pengajuan</span>
                                                                                            </p>
                                                                                    @elseif($d->detail['penerimaan'] === 'ditolak')
                                                                                    <p><span
                                                                                                class="bg-danger label">Ditolak</span>
                                                                                            </p>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-end">
                                                                        <button type="button"
                                                                            class="btn btn-default float-right"
                                                                            data-dismiss="modal">Tutup</button>

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
                                    <div class="card-footer clearfix"
                                        style="max-height: 65px !important; {{ $magang->hasPages() ? '' : 'height: 45px !important;' }}">
                                        {{ $magang->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
