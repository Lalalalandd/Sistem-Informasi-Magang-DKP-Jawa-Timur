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
                                            Universitas/instansi terbanyak
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
                                                                    aria-valuenow="{{ $univ->jumlah }}" aria-valuemin="0" aria-valuemax="{{ $total }}"
                                                                    style="width: {{ $univ->persentase }}%">
                                                                    <span class="sr-only">{{ $univ->jumlah }}% Complete</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 10%;">{{ $univ->jumlah }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr class="text-center">
                                                    <td colspan="2"><dt>Total</dt></td>
                                                    <td><dt>{{ $total }}</dt></td>
                                                </tr>
                                                {{-- <tr>
                                                    <td style="width: 20%;">{{ $univ->universitas }}</td>
                                                    <td style="width: 70%;">
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar progress-bar-danger"
                                                                style="width: {{ $persentase }}"></div>
                                                        </div>
                                                    </td>
                                                    <td style="width: 10%;">sdf</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
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
