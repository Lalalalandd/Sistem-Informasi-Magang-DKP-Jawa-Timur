@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <!-- Form Filter -->
                    <form method="GET" action="/aktivitas_mhsw" class="d-flex align-items-center justify-content-end">
                        <div class="row mr-2">
                            
                            <select name="status" id="status" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="ditinjau" {{ request('status') == 'ditinjau' ? 'selected' : '' }}>Ditinjau</option>
                                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $x = 1;
                                            use Carbon\Carbon;
                                        @endphp
                                        @if ($logbook->isEmpty())
                                            <td colspan="8" class="text-center">Data tidak ada.</td>
                                        @endif
                                        @foreach ($logbook as $d)
                                            <tr>
                                                <td scope="row" class="text-center align-middle">
                                                    <dt>{{ $x++ }}</dt>
                                                </td>
                                                <td class="align-middle">{{ $d->user['name'] }}</td>
                                                <td class="align-middle">{{ Carbon::parse($d->tanggal)->format('d M Y') }}
                                                </td>
                                                <td class="align-middle">{{ $d->aktivitas }}</td>
                                                @if ($d->bukti != null)
                                                    @php
                                                        $urlBukti = Storage::url($d->bukti);
                                                    @endphp
                                                    <td class="align-middle">
                                                        <a href="#" data-toggle="modal" data-target="#buktiModal"
                                                            data-url="{{ $urlBukti }}">Lihat bukti</a>
                                                    </td>
                                                @else
                                                    <td class="align-middle">Tidak ada bukti</td>
                                                @endif
                                                <td class="align-middle">
                                                    @if ($d->presensi === 'masuk')
                                                        <span class="bg-success label">Masuk</span>
                                                    @elseif ($d->presensi === 'izin')
                                                        <span class="bg-info label">Izin</span>
                                                    @elseif ($d->presensi === 'bolos')
                                                        <span class="bg-danger label">Bolos</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    @if ($d->status === 'ditinjau')
                                                        <span class="btn btn-outline-info">Di tinjau</span>
                                                    @elseif ($d->status === 'diterima')
                                                        <span class="btn btn-outline-success">Di terima</span>
                                                    @elseif ($d->status === 'ditolak')
                                                        <span class="btn btn-outline-danger">Di tolak</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex d-inline">
                                                    <form action="/aktivitas_mhsw/{{ $d->id }}" method="POST">
                                                        @method('put')
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="status" value="diterima">
                                                        <button class="btn btn-outline-success mr-1" type="submit"
                                                            title="terima"><i class="fas fa-check"></i></button>
                                                    </form>
                                                    <form action="/aktivitas_mhsw/{{ $d->id }}" method="POST">
                                                        @method('put')
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="status" value="ditolak">
                                                        <button class="btn btn-outline-danger" type="submit"
                                                            title="tolak"><i class="fas fa-times"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
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

        
    </div>
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
                <div class="modal-body text-center">
                    <!-- Konten modal akan diisi melalui JavaScript -->
                    <img id="buktiImage" src="" alt="Bukti"
                        style="max-width: 500px; max-height: 500px; width: auto; height: auto;">
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
                modal.find('.modal-body img').attr('src', url);
            });

            $('#buktiModal').on('hidden.bs.modal', function(event) {
                var modal = $(this);
                modal.find('.modal-body img').attr('src', '');
            });
        });
    </script>
@endsection
