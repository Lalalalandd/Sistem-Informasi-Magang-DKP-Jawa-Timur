@extends('layouts.template')
@section('content')
@php
use Carbon\Carbon;
@endphp
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold" style="color: #1e293b;">Dashboard</h1>
                    <p class="text-muted small">Ringkasan data aktivitas magang</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <!-- Stats Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="card p-3 border-0 shadow-sm"
                        style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 opacity-75">Magang Aktif</h6>
                            <i class="fas fa-user-clock opacity-50 fa-lg"></i>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $magangaktif }}</h2>
                        <small class="opacity-75">Mahasiswa</small>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card p-3 border-0 shadow-sm"
                        style="background: linear-gradient(135deg, #198754 0%, #157347 100%); color: white;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 opacity-75">Magang Lulus</h6>
                            <i class="fas fa-user-graduate opacity-50 fa-lg"></i>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $maganglulus }}</h2>
                        <small class="opacity-75">Mahasiswa</small>
                    </div>
                </div>
            </div>

            <!-- Main Row -->
            <div class="row mt-3">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div
                            class="card-header border-0 bg-white d-flex justify-content-between align-items-center mt-2">
                            <h5 class="card-title mb-0 fw-bold text-dark">Statistik Universitas</h5>
                            <span class="badge bg-light text-dark border">Top {{ count($universitasTerbanyak) }}</span>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="border-0 rounded-start" style="width: 30%;">Universitas</th>
                                            <th class="border-0" style="width: 50%;">Progress</th>
                                            <th class="border-0 rounded-end text-center" style="width: 20%;">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($universitasTerbanyak as $univ)
                                        <tr>
                                            <td class="fw-medium">{{ $univ->universitas }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1"
                                                        style="height: 6px; border-radius: 10px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            aria-valuenow="{{ $univ->jumlah }}" aria-valuemin="0"
                                                            aria-valuemax="{{ $total }}"
                                                            style="width: {{ $univ->persentase }}%; background-color: #0d6efd; border-radius: 10px;">
                                                        </div>
                                                    </div>
                                                    <span class="ms-2 small text-muted">{{ round($univ->persentase)
                                                        }}%</span>
                                                </div>
                                            </td>
                                            <td class="text-center fw-bold text-primary">{{ $univ->jumlah }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="border-top">
                                        <tr>
                                            <td colspan="2" class="fw-bold text-end">Total Mahasiswa</td>
                                            <td class="text-center fw-bold">{{ $total }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Additional widgets can go here -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center p-5">
                            <img src="{{ asset('template/img/dkp.png') }}" class="img-fluid mb-3"
                                style="max-height: 100px; opacity: 0.8;" alt="DKP Logo">
                            <h5 class="fw-bold text-dark">SIP MAGANG</h5>
                            <p class="text-muted mb-0 small">Sistem Informasi Pengelolaan Magang Dinas Kelautan dan
                                Perikanan Provinsi Jawa Timur</p>
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