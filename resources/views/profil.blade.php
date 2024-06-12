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
                               <h3 class="card-title my-2">Ubah Profil</h3>
                            </div>
                            <form action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label for="">Foto Profil</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input"
                                                        id="exampleInputFile"
                                                        name="lampiran">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <label for="" class="mt-1 small text-danger">*) File harus bertipe
                                                .png/.jpg</label>
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="">Nama</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <input type="text" name="" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="mt-4 btn btn-primary float-right">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
