@extends('layouts.template')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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

                    <div class="col-7">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="" style="color:#2574EA;">
                                            Universitas terbanyak
                                        </h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <table class="table table-bordered">
                                            <tbody>

                                                @foreach ($universitasTerbanyak as $univ)
                                                    <tr class="text-center">
                                                        <td style="width: 20%;">{{ $univ->universitas }}</td>
                                                        <td style="width: 70%;">
                                                            <div class="progress mb-3">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    aria-valuenow="{{ $univ->jumlah }}" aria-valuemin="0"
                                                                    aria-valuemax="{{ $total }}"
                                                                    style="width: {{ $univ->persentase }}%">
                                                                    <span class="sr-only">{{ $univ->jumlah }}%
                                                                        Complete</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 10%;">{{ $univ->jumlah }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr class="text-center">
                                                    <td colspan="2">
                                                        <dt>Total</dt>
                                                    </td>
                                                    <td>
                                                        <dt>{{ $total }}</dt>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-5 d-flex">
                        <div class="row">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="far fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Mahasiswa Magang Aktif</span>
                                    <span class="info-box-number">{{ $magangaktif }}</span>
                                </div>
                            </div>
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Mahasiswa Magang Lulus</span>
                                    <span class="info-box-number">{{ $maganglulus }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        @if (session('info'))
            toastr.info('{{ session('info') }}');
        @endif
    </script>
@endpush
