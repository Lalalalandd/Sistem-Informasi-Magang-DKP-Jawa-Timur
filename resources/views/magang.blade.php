@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <form method="GET" action="/magang" id="filterForm">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    {{-- <label for="periode_magang_id" class="mr-2">Periode Magang</label> --}}
                                    <i class="mr-2" style="color:#2574EA;"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="1.5em" height="1.5em" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                d="M18 28h-4a2 2 0 0 1-2-2v-7.59L4.59 11A2 2 0 0 1 4 9.59V6a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v3.59a2 2 0 0 1-.59 1.41L20 18.41V26a2 2 0 0 1-2 2M6 6v3.59l8 8V26h4v-8.41l8-8V6Z" />
                                        </svg></i>
                                    <select name="periode_magang_id" id="periode_magang_id" class="form-select"
                                        style="width: 200px;">
                                        <option value="">Pilih Periode</option>
                                        @foreach ($periodeMagang as $periode)
                                            <option value="{{ $periode->id }}"
                                                {{ request('periode_magang_id') == $periode->id ? 'selected' : '' }}>
                                                {{ $periode->nama_periode }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                </div>
                            </div>
                        </form>
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
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Nama Ketua</th>
                                            <th>Universitas</th>
                                            <th>Tgl. Mulai</th>
                                            <th>Tgl. Selesai</th>
                                            <th>Dinas</th>
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
                                                <td colspan="11" class="text-center">Data pendaftar magang tidak ada</td>
                                            </tr>
                                        @endif
                                        @foreach ($magang as $d)
                                            <tr>
                                                <td scope="row" class="align-middle text-center">
                                                    <dt>{{ $x++ }}</dt>
                                                    </th>
                                                <td class="align-middle">{{ $d->name }}</td>
                                                <td class="align-middle">{{ $d->detail['universitas']->universitas }}</td>
                                                <td class="align-middle">
                                                    {{ Carbon::parse($d->detail['tgl_mulai'])->format('d M Y') }}</td>
                                                <td class="align-middle">
                                                    {{ Carbon::parse($d->detail['tgl_selesai'])->format('d M Y') }}</td>
                                                <td class="align-middle">{{ $d->dinas['dinas'] }}</td>
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
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                        <p>{{ $d->detail->sub_bagian->sub_bagian }}</p>
                                                                    </div>
                                                                    @if ($d->detail->surat_balasan == null)
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Surat
                                                                                    Balasan</label>
                                                                                <div class="input-group">
                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            id="exampleInputFile"
                                                                                            name="surat_balasan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Surat
                                                                                    Balasan</label>
                                                                                <div class="input-group">
                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            id="exampleInputFile"
                                                                                            name="surat_balasan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="float-right">
                                                                                <a href="{{ Storage::url($d->detail->surat_balasan) }}"
                                                                                    target="_blank">Lihat Surat
                                                                                    Balasan</a>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Surat
                                                                                Keterangan</label>
                                                                            <div class="input-group">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="exampleInputFile"
                                                                                        name="surat_balasan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Sertifikat Magang</label>
                                                                            <div class="input-group">
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="exampleInputFile"
                                                                                        name="surat_balasan">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <label for="status"
                                                                            class="col-form-label">Penerimaan</label>
                                                                        <select class="form-control select2bs4"
                                                                            style="width: 100%;" name="penerimaan"
                                                                            id="penerimaan">
                                                                            <option value="diproses"
                                                                                {{ $d->detail['penerimaan'] == 'diproses' ? 'selected' : '' }}
                                                                                disabled>
                                                                                Diproses
                                                                            </option>
                                                                            <option value="diterima"
                                                                                {{ $d->detail['penerimaan'] == 'diterima' ? 'selected' : '' }}>
                                                                                Diterima
                                                                            </option>
                                                                            <option value="ditolak"
                                                                                {{ $d->detail['penerimaan'] == 'ditolak' ? 'selected' : '' }}>
                                                                                Ditolak
                                                                            </option>
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
    </div>
@endsection

<script>
    document.getElementById('filterForm').addEventListener('submit', function(e) {
        var periodeMagangId = document.getElementById('periode_magang_id').value;
        if (periodeMagangId === '') {
            var formAction = this.action;
            this.action = formAction.split('?')[0]; // Remove query string
        }
    });
</script>
