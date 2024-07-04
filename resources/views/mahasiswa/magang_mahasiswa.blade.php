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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title text-primary text-bold">
                                    Surat dan Sertifikat
                                </h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="" class="mb-4 "> Surat Balasan:</label>
                                        <label for="" class="mb-4"> Surat Keterangan:</label>
                                        <label for="" class="mb-4"> Sertifikat Magang:</label>
                                    </div>
                                    <div class="col-8">
                                        <form
                                            action="{{ $detail->surat_balasan ? Storage::url($detail->surat_balasan) : '#' }}"
                                            method="get" target="_blank">
                                            <button type="submit" class="btn mb-2"
                                                style="width:100%; background-color: #FFD1E2 !important; color:#E96494;"
                                                {{ $detail->surat_balasan == null ? 'disabled' : '' }}>
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        viewBox="0 0 256 256">
                                                        <g fill="currentColor">
                                                            <path d="M208 88h-56V32Z" opacity="0.2" />
                                                            <path
                                                                d="M224 152a8 8 0 0 1-8 8h-24v16h16a8 8 0 0 1 0 16h-16v16a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h32a8 8 0 0 1 8 8M92 172a28 28 0 0 1-28 28h-8v8a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h16a28 28 0 0 1 28 28m-16 0a12 12 0 0 0-12-12h-8v24h8a12 12 0 0 0 12-12m88 8a36 36 0 0 1-36 36h-16a8 8 0 0 1-8-8v-56a8 8 0 0 1 8-8h16a36 36 0 0 1 36 36m-16 0a20 20 0 0 0-20-20h-8v40h8a20 20 0 0 0 20-20M40 112V40a16 16 0 0 1 16-16h96a8 8 0 0 1 5.66 2.34l56 56A8 8 0 0 1 216 88v24a8 8 0 0 1-16 0V96h-48a8 8 0 0 1-8-8V40H56v72a8 8 0 0 1-16 0m120-32h28.69L160 51.31Z" />
                                                        </g>
                                                    </svg>
                                                </i>
                                                Unduh Surat
                                            </button>
                                        </form>
                                        <form
                                            action="{{ $detail->surat_keterangan ? Storage::url($detail->surat_keterangan) : '#' }}"
                                            method="get" target="_blank">
                                            <button type="submit" class="btn mb-2"
                                                style="width:100%; background-color: #FFD1E2 !important; color:#E96494;"
                                                {{ $detail->surat_keterangan == null ? 'disabled' : '' }}>
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        viewBox="0 0 256 256">
                                                        <g fill="currentColor">
                                                            <path d="M208 88h-56V32Z" opacity="0.2" />
                                                            <path
                                                                d="M224 152a8 8 0 0 1-8 8h-24v16h16a8 8 0 0 1 0 16h-16v16a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h32a8 8 0 0 1 8 8M92 172a28 28 0 0 1-28 28h-8v8a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h16a28 28 0 0 1 28 28m-16 0a12 12 0 0 0-12-12h-8v24h8a12 12 0 0 0 12-12m88 8a36 36 0 0 1-36 36h-16a8 8 0 0 1-8-8v-56a8 8 0 0 1 8-8h16a36 36 0 0 1 36 36m-16 0a20 20 0 0 0-20-20h-8v40h8a20 20 0 0 0 20-20M40 112V40a16 16 0 0 1 16-16h96a8 8 0 0 1 5.66 2.34l56 56A8 8 0 0 1 216 88v24a8 8 0 0 1-16 0V96h-48a8 8 0 0 1-8-8V40H56v72a8 8 0 0 1-16 0m120-32h28.69L160 51.31Z" />
                                                        </g>
                                                    </svg>
                                                </i>
                                                Unduh Surat
                                            </button>
                                        </form>
                                        <form action="{{ $detail->sertifikat ? Storage::url($detail->sertifikat) : '#' }}"
                                            method="get" target="_blank">
                                            <button type="submit" class="btn mb-2"
                                                style="width:100%; background-color: #FFD1E2 !important; color:#E96494;"
                                                {{ $detail->sertifikat == null ? 'disabled' : '' }}>
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        viewBox="0 0 256 256">
                                                        <g fill="currentColor">
                                                            <path d="M208 88h-56V32Z" opacity="0.2" />
                                                            <path
                                                                d="M224 152a8 8 0 0 1-8 8h-24v16h16a8 8 0 0 1 0 16h-16v16a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h32a8 8 0 0 1 8 8M92 172a28 28 0 0 1-28 28h-8v8a8 8 0 0 1-16 0v-56a8 8 0 0 1 8-8h16a28 28 0 0 1 28 28m-16 0a12 12 0 0 0-12-12h-8v24h8a12 12 0 0 0 12-12m88 8a36 36 0 0 1-36 36h-16a8 8 0 0 1-8-8v-56a8 8 0 0 1 8-8h16a36 36 0 0 1 36 36m-16 0a20 20 0 0 0-20-20h-8v40h8a20 20 0 0 0 20-20M40 112V40a16 16 0 0 1 16-16h96a8 8 0 0 1 5.66 2.34l56 56A8 8 0 0 1 216 88v24a8 8 0 0 1-16 0V96h-48a8 8 0 0 1-8-8V40H56v72a8 8 0 0 1-16 0m120-32h28.69L160 51.31Z" />
                                                        </g>
                                                    </svg>
                                                </i>
                                                Unduh Sertifikat
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title text-primary">
                                    Presensi
                                </h3>
                            </div>

                            <div class="card-body">

                            </div>
                        </div>
                    </div>

                    <div class="col-6 mt-3">
                        <h4 for="aktivitas">Aktivitas harian</h4>
                    </div>

                    <div class="col-6 mt-3">
                        <button class="btn btn-outline-primary float-right">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                                        <path
                                            d="M12.25 2.834c-.46-.078-1.088-.084-2.22-.084c-1.917 0-3.28.002-4.312.14c-1.012.135-1.593.39-2.016.812c-.423.423-.677 1.003-.812 2.009c-.138 1.028-.14 2.382-.14 4.29v4c0 1.906.002 3.26.14 4.288c.135 1.006.389 1.586.812 2.01c.423.422 1.003.676 2.009.811c1.028.139 2.382.14 4.289.14h4c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812c.423-.423.677-1.003.812-2.009c.138-1.027.14-2.382.14-4.289v-.437c0-1.536-.01-2.264-.174-2.813h-3.13c-1.133 0-2.058 0-2.79-.098c-.763-.103-1.425-.325-1.954-.854c-.529-.529-.751-1.19-.854-1.955c-.098-.73-.098-1.656-.098-2.79zm1.5.776V5c0 1.2.002 2.024.085 2.643c.08.598.224.891.428 1.094c.203.204.496.348 1.094.428c.619.083 1.443.085 2.643.085h2.02a45.815 45.815 0 0 0-1.17-1.076l-3.959-3.563A37.2 37.2 0 0 0 13.75 3.61m-3.575-2.36c1.385 0 2.28 0 3.103.315c.823.316 1.485.912 2.51 1.835l.107.096l3.958 3.563l.125.112c1.184 1.065 1.95 1.754 2.361 2.678c.412.924.412 1.954.411 3.546v.661c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.944c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433V9.945c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.75-.749 1.701-1.08 2.878-1.238c1.144-.153 2.607-.153 4.455-.153h.056z" />
                                        <path
                                            d="M7.987 19.047a.75.75 0 0 0 1.026 0l2-1.875a.75.75 0 0 0-1.026-1.094l-.737.69V13.5a.75.75 0 1 0-1.5 0v3.269l-.737-.691a.75.75 0 1 0-1.026 1.094z" />
                                    </g>
                                </svg>
                            </i>
                            Download Logbook!</button>
                        <button class="btn btn-outline-primary float-right mr-3" type="button" data-toggle="modal"
                            data-target="#tambahdata">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9" />
                                </svg>
                            </i>
                            Tambah Kegiatan</button>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Aktivitas</th>
                                            <th scope="col">Bukti</th>
                                            <th scope="col">Presensi</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            use Carbon\Carbon;
                                            $x = 1;
                                        @endphp
                                        @if ($magang->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">Aktivitas harian belum dibuat</td>
                                            </tr>
                                        @endif
                                        @foreach ($magang as $d)
                                            <tr>
                                                <th scope="row">{{ $x++ }}</th>
                                                <td>{{ $d->tanggal }}</td>
                                                <td>{{ $d->aktivitas }}</td>
                                                @if ($d->bukti != null)
                                                    @php
                                                        $urlBukti = Storage::url($d->bukti);
                                                    @endphp
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#buktiModal"
                                                            data-url="{{ $urlBukti }}">Lihat bukti</a>
                                                    </td>
                                                @else
                                                    <td>Tidak ada bukti</td>
                                                @endif
                                                <td>
                                                    @if ($d->presensi === 'masuk')
                                                        <span class="bg-success label">Masuk</span>
                                                    @elseif ($d->presensi === 'izin')
                                                        <span class="bg-info label">Izin</span>
                                                    @elseif ($d->presensi === 'bolos')
                                                        <span class="bg-danger label">Bolos</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($d->status === 'ditinjau')
                                                        <span class="btn btn-outline-info">Di tinjau</span>
                                                    @elseif ($d->status === 'diterima')
                                                        <span class="btn btn-outline-success">Di terima</span>
                                                    @elseif ($d->status === 'ditolak')
                                                        <span class="btn btn-outline-danger">Di tolak</span>
                                                    @endif
                                                </td>
                                                <td><button class="btn btn-outline-primary" type="button"
                                                        data-toggle="modal" data-target="#edit{{ $x }}"
                                                        title="edit" {{ $d->status == "diterima" || $d->status == "ditolak" ? "disabled" : ""}}>Edit</button></td>
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
            </div>
        </div>
        <!-- /.modal tambah data -->
        <div class="modal fade" id="tambahdata">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kegiatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/logbook" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <label for="tanggal" class="col-form-label float-right">Tanggal:
                                    {{ Carbon::today()->format('d-m-Y') }}</label>
                                <input type="hidden" name="tanggal" value="{{ Carbon::today()->toDateString() }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="status" value="ditinjau">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="aktivitas" class="col-form-label">Aktivitas</label>
                                <input type="text" class="form-control @error('aktivitas') is-invalid @enderror"
                                    id="aktivitas" name="aktivitas" required placeholder="aktivitas yang ingin diberikan"
                                    value="{{ old('aktivitas') }}">
                                @error('aktivitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Bukti</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="bukti">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                    </div>
                                    <label for="" class="mt-1 small text-danger">*) File harus bertipe
                                        .png/.jpg</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="presensi" class="col-form-label">Presensi</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="presensi"
                                    id="presensi">
                                    <option value="masuk">
                                        Masuk
                                    </option>
                                    <option value="izin">
                                        Izin
                                    </option>
                                    <option value="bolos">
                                        Bolos
                                    </option>
                                </select>

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

        <!-- Modal -->
        <div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="buktiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buktiModalLabel">Lihat Bukti</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Konten modal akan diisi melalui JavaScript -->
                        <iframe id="buktiFrame" src="" width="100%" height="500px" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#buktiModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var url = button.data('url');
                    var modal = $(this);
                    modal.find('.modal-body iframe').attr('src', url);
                });

                $('#buktiModal').on('hidden.bs.modal', function(event) {
                    var modal = $(this);
                    modal.find('.modal-body iframe').attr('src',
                        '');
                });
            });
        </script>
    @endsection

    @push('scripts')
    <script>

            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif
    
    </script>
@endpush
