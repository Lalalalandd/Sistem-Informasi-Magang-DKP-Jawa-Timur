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
                                        <form
                                            action="{{ $detail->sertifikat ? Storage::url($detail->sertifikat) : '#' }}"
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
                        <button class="btn btn-outline-primary float-right mr-3">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9" />
                                </svg>
                            </i>
                            Tambah Kegiatan</button>
                    </div>

                    <div class="col-12">

                    </div>

                </div>
            </div>
        </div>
    @endsection
