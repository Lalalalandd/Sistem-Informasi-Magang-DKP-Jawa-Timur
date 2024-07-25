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
                <div class="col-12 d-flex d-inline ">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary"><i class="far fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mahasiswa Magang Aktif</span>
                                <span class="info-box-number">{{ $magangaktif }}</span>
                            </div>
                        </div>
                        <div class="info-box ml-3">
                            <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mahasiswa Magang Lulus</span>
                                <span class="info-box-number">{{ $maganglulus }}</span>
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