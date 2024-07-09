<!-- Sidebar Menu -->
<nav class="mt-3">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <div class="card" style="background-color: #161B22; color:aliceblue;">
                <div class="card-body">

                    <div class="col-4 ">
                        <h6 class="text-bold small"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1"
                                width="1em" height="1em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5">
                                    <path
                                        d="M6.133 21C4.955 21 4 20.02 4 18.81v-8.802c0-.665.295-1.295.8-1.71l5.867-4.818a2.09 2.09 0 0 1 2.666 0l5.866 4.818c.506.415.801 1.045.801 1.71v8.802c0 1.21-.955 2.19-2.133 2.19z" />
                                    <path d="M9.5 21v-5.5a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2V21" />
                                </g>
                            </svg>Dinas</h6>
                    </div>
                    <div class="col-12">
                        @php
                            $dinas = auth()->user()->load('dinas');
                        @endphp
                        <h6 class="text-wrap small" style="color: rgb(163, 163, 163);">
                            {{ $dinas->dinas->dinas }}
                        </h6>
                    </div>

                </div>
            </div>
        </li>
        <li class="nav-header">
            Main Menu
        </li>
        <li class="nav-item">
            <a href="/beranda" class="nav-link {{ $tittle === 'Beranda' ? 'active' : '' }}">
                <i class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M8.557 2.75H4.682A1.932 1.932 0 0 0 2.75 4.682v3.875a1.942 1.942 0 0 0 1.932 1.942h3.875a1.942 1.942 0 0 0 1.942-1.942V4.682A1.942 1.942 0 0 0 8.557 2.75m10.761 0h-3.875a1.942 1.942 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.942 1.942 0 0 0 1.932-1.942V4.682a1.932 1.932 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.932 1.932 0 0 0 1.932 1.932h3.875a1.942 1.942 0 0 0 1.942-1.932v-3.875a1.942 1.942 0 0 0-1.942-1.942m8.818-.001a3.875 3.875 0 1 0 0 7.75a3.875 3.875 0 0 0 0-7.75" />
                    </svg></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item {{ $tittle === 'Pegawai' || $tittle === 'Mahasiswa' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ $tittle === 'Pegawai' || $tittle === 'Mahasiswa' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M17 19.5c0-1.657-2.239-3-5-3s-5 1.343-5 3m14-3c0-1.23-1.234-2.287-3-2.75M3 16.5c0-1.23 1.234-2.287 3-2.75m12-4.014a3 3 0 1 0-4-4.472M6 9.736a3 3 0 0 1 4-4.472m2 8.236a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                    </svg></i>
                <p>
                    Akun
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/mahasiswa" class="nav-link {{ $tittle === 'Mahasiswa' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pegawai" class="nav-link {{ $tittle === 'Pegawai' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/magang" class="nav-link {{ $tittle === 'Magang' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M144 80a8 8 0 0 1 8-8h96a8 8 0 0 1 0 16h-96a8 8 0 0 1-8-8m104 40h-96a8 8 0 0 0 0 16h96a8 8 0 0 0 0-16m0 48h-72a8 8 0 0 0 0 16h72a8 8 0 0 0 0-16m-96.25 22a8 8 0 0 1-5.76 9.74a7.55 7.55 0 0 1-2 .26a8 8 0 0 1-7.75-6c-6.16-23.94-30.34-42-56.25-42s-50.09 18.05-56.25 42a8 8 0 0 1-15.5-4c5.59-21.71 21.84-39.29 42.46-48a48 48 0 1 1 58.58 0c20.63 8.71 36.88 26.29 42.47 48M80 136a32 32 0 1 0-32-32a32 32 0 0 0 32 32" />
                    </svg></i>
                <p>
                    Magang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/periodemagang" class="nav-link {{ $tittle === 'Periode Magang' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" d="M10 7H2m6 5H2m8 5H2" />
                            <circle cx="17" cy="12" r="5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 10v1.846L18 13" />
                        </g>
                    </svg></i>
                <p>
                    Periode Magang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="tugas" class="nav-link {{ $tittle === 'Tugas' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M9 6h11M3.8 5.8l.8.8l2-2m-2.8 7.2l.8.8l2-2m-2.8 7.2l.8.8l2-2M9 12h11M9 18h11" />
                    </svg></i>
                <p>
                    Tugas
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="dinas" class="nav-link {{ $tittle === 'Dinas' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                        viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M192 128v704h384V128zm-32-64h448a32 32 0 0 1 32 32v768a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32" />
                        <path fill="currentColor"
                            d="M256 256h256v64H256zm0 192h256v64H256zm0 192h256v64H256zm384-128h128v64H640zm0 128h128v64H640zM64 832h896v64H64z" />
                        <path fill="currentColor"
                            d="M640 384v448h192V384zm-32-64h256a32 32 0 0 1 32 32v512a32 32 0 0 1-32 32H608a32 32 0 0 1-32-32V352a32 32 0 0 1 32-32" />
                    </svg></i>
                <p>
                    Dinas
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="subbagian" class="nav-link {{ $tittle === 'Sub Bagian' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20 6c.58 0 1.05.2 1.42.59c.38.41.58.86.58 1.41v11c0 .55-.2 1-.58 1.41c-.37.39-.84.59-1.42.59H4c-.58 0-1.05-.2-1.42-.59C2.2 20 2 19.55 2 19V8c0-.55.2-1 .58-1.41C2.95 6.2 3.42 6 4 6h4V4c0-.58.2-1.05.58-1.42C8.95 2.2 9.42 2 10 2h4c.58 0 1.05.2 1.42.58c.38.37.58.84.58 1.42v2zM4 8v11h16V8zm10-2V4h-4v2z" />
                    </svg></i>
                <p>
                    Sub-Bagian
                </p>
            </a>
        </li>

        {{-- <li class="nav-header">
            Preferensi
        </li>
        <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M600.704 64a32 32 0 0 1 30.464 22.208l35.2 109.376c14.784 7.232 28.928 15.36 42.432 24.512l112.384-24.192a32 32 0 0 1 34.432 15.36L944.32 364.8a32 32 0 0 1-4.032 37.504l-77.12 85.12a357 357 0 0 1 0 49.024l77.12 85.248a32 32 0 0 1 4.032 37.504l-88.704 153.6a32 32 0 0 1-34.432 15.296L708.8 803.904c-13.44 9.088-27.648 17.28-42.368 24.512l-35.264 109.376A32 32 0 0 1 600.704 960H423.296a32 32 0 0 1-30.464-22.208L357.696 828.48a352 352 0 0 1-42.56-24.64l-112.32 24.256a32 32 0 0 1-34.432-15.36L79.68 659.2a32 32 0 0 1 4.032-37.504l77.12-85.248a357 357 0 0 1 0-48.896l-77.12-85.248A32 32 0 0 1 79.68 364.8l88.704-153.6a32 32 0 0 1 34.432-15.296l112.32 24.256c13.568-9.152 27.776-17.408 42.56-24.64l35.2-109.312A32 32 0 0 1 423.232 64H600.64zm-23.424 64H446.72l-36.352 113.088l-24.512 11.968a294 294 0 0 0-34.816 20.096l-22.656 15.36l-116.224-25.088l-65.28 113.152l79.68 88.192l-1.92 27.136a293 293 0 0 0 0 40.192l1.92 27.136l-79.808 88.192l65.344 113.152l116.224-25.024l22.656 15.296a294 294 0 0 0 34.816 20.096l24.512 11.968L446.72 896h130.688l36.48-113.152l24.448-11.904a288 288 0 0 0 34.752-20.096l22.592-15.296l116.288 25.024l65.28-113.152l-79.744-88.192l1.92-27.136a293 293 0 0 0 0-40.256l-1.92-27.136l79.808-88.128l-65.344-113.152l-116.288 24.96l-22.592-15.232a288 288 0 0 0-34.752-20.096l-24.448-11.904L577.344 128zM512 320a192 192 0 1 1 0 384a192 192 0 0 1 0-384m0 64a128 128 0 1 0 0 256a128 128 0 0 0 0-256" />
                    </svg></i>
                <p>
                    Pengaturan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <form action="/logout" method="post">
                {{ csrf_field() }}
                <button class="nav-link btn btn-danger text-left" type="submit" style="color: white;">
                    <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 512 512">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32"
                                d="M304 336v40a40 40 0 0 1-40 40H104a40 40 0 0 1-40-40V136a40 40 0 0 1 40-40h152c22.09 0 48 17.91 48 40v40m64 160l80-80l-80-80m-192 80h256" />
                        </svg></i>
                    <p>
                        Keluar
                    </p>
                </button>
            </form>
        </li> --}}
    </ul>
</nav>
{{-- {{ Request::is('beranda/*') ? 'active' : '' }} --}}
