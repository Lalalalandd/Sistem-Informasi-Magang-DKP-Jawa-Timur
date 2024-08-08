@extends('layouts.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">



                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @if (auth()->user()->role == "mahasiswa")
        {{-- Mahasiswa --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($user->image == null)
                                        <img class="profile-user-img img-fluid img-circle" src="template/img/user-image.png"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/' . $user->image) }}" alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center my-4">{{ $user->name }}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Dinas</b> <a class="text-muted float-right">{{ $dinas->dinas }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="text-muted float-right">{{ $user->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Universitas</b> <a class="text-muted float-right">{{ $user->detail['universitas']->universitas }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Fakultas</b> <a class="text-muted float-right">{{ $user->detail['fakultas'] }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Program Studi</b> <a class="text-muted float-right">{{ $user->detail['prodi'] }}</a>
                                    </li>
                                    @if ($user->detail['nama_kelompok_1'] != null)
                                    <li class="list-group-item">
                                        <b>Anggota 1</b> <a class="text-muted float-right">{{ $user->detail['nama_kelompok_1'] }}</a>
                                    </li>
                                    @endif

                                    @if ($user->detail['nama_kelompok_2'] != null)
                                    <li class="list-group-item">
                                        <b>Anggota 2</b> <a class="text-muted float-right">{{ $user->detail['nama_kelompok_2'] }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title my-2"><i class="mr-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                            <circle cx="12" cy="6" r="4" fill="currentColor" />
                                            <path fill="currentColor"
                                                d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" />
                                        </svg></i>Ubah Profil</h3>
                            </div>
                            <form action="/profil/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                      
                                        <div class="col-lg-2">
                                            <label for="">Foto Profil</label>
                                        </div>
                                        <div class="col-lg-10 ">
                                            <input type="file"
                                                class="form-control  @error('surat_pengantar') is-invalid @enderror"
                                                id="image" name="image">
                                            <label for="" class="small text-danger">*) File harus bertipe
                                                .png/.jpg</label>
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="">Nama</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" class="form-control"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>

                                        @if ($user->detail['nama_kelompok_1'] != null)
                                        <div class="col-lg-2">
                                            <label for="">Anggota 1</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="nama_kelompok_1" id="nama_kelompok_1" class="form-control"
                                                    value="{{ $user->detail['nama_kelompok_1'] }}">
                                            </div>
                                        </div>
                                        @endif

                                        @if ($user->detail['nama_kelompok_2'] != null)
                                        <div class="col-lg-2">
                                            <label for="">Anggota 1</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="nama_kelompok_2" id="nama_kelompok_2" class="form-control"
                                                    value="{{ $user->detail['nama_kelompok_2'] }}">
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-lg-12">
                                            <button type="submit" class="mt-4 btn btn-primary float-right">Simpan
                                                Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        @else
        {{-- Pegawai dan Admin --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($user->image == null)
                                        <img class="profile-user-img img-fluid img-circle" src="template/img/user-image.png"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/' . $user->image) }}" alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center my-4">{{ $user->name }}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Dinas</b> <a class="text-muted float-right">{{ $dinas->dinas }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="text-muted float-right">{{ $user->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Role</b> <a class="text-muted float-right">{{ $user->role }}</a>
                                    </li>
                            
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title my-2"><i class="mr-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                            <circle cx="12" cy="6" r="4" fill="currentColor" />
                                            <path fill="currentColor"
                                                d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" />
                                        </svg></i>Ubah Profil</h3>
                            </div>
                            <form action="/profil/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label for="">Foto Profil</label>
                                        </div>
                                        <div class="col-lg-10 ">
                                            <input type="file"
                                                class="form-control  @error('surat_pengantar') is-invalid @enderror"
                                                id="image" name="image">
                                            <label for="" class="small text-danger">*) File harus bertipe
                                                .png/.jpg</label>
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="">Nama</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" class="form-control"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="mt-4 btn btn-primary float-right">Simpan
                                                Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection

@push('scripts')
    <script>

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif
    
    </script>
@endpush
