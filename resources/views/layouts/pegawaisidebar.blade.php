<!-- Sidebar Menu -->
<nav class="mt-3">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <div class="card" style="background-color: #161B22; color:aliceblue;">
                <div class="card-body">

                    <div class="col-4 ">
                        <h6 class="text-bold small"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="1em" height="1em" viewBox="0 0 24 24">
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
            <a href="/beranda_pegawai" class="nav-link {{ $tittle === 'Beranda' ? 'active' : '' }}">
                <i class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M8.557 2.75H4.682A1.932 1.932 0 0 0 2.75 4.682v3.875a1.942 1.942 0 0 0 1.932 1.942h3.875a1.942 1.942 0 0 0 1.942-1.942V4.682A1.942 1.942 0 0 0 8.557 2.75m10.761 0h-3.875a1.942 1.942 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.942 1.942 0 0 0 1.932-1.942V4.682a1.932 1.932 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.932 1.932 0 0 0 1.932 1.932h3.875a1.942 1.942 0 0 0 1.942-1.932v-3.875a1.942 1.942 0 0 0-1.942-1.942m8.818-.001a3.875 3.875 0 1 0 0 7.75a3.875 3.875 0 0 0 0-7.75" />
                    </svg></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/magang_pegawai" class="nav-link {{ $tittle === 'Magang' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <g fill="none">
                            <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                            <path stroke="currentColor" stroke-width="1.5"
                                d="M18 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S5.582 13 10 13s8 2.015 8 4.5Z" />
                            <path fill="currentColor"
                                d="m18.089 12.539l.455-.597zM19 8.644l-.532.528a.75.75 0 0 0 1.064 0zm.912 3.895l-.456-.597zm-1.368-.597c-.487-.371-.925-.668-1.278-1.053c-.327-.357-.516-.725-.516-1.19h-1.5c0 .95.414 1.663.91 2.204c.471.513 1.077.93 1.474 1.232zM16.75 9.7c0-.412.24-.745.547-.881c.267-.118.69-.13 1.171.353l1.064-1.057c-.87-.875-1.945-1.065-2.842-.668A2.455 2.455 0 0 0 15.25 9.7zm.884 3.435c.148.113.342.26.545.376c.204.116.487.239.821.239v-1.5c.034 0 .017.011-.082-.044c-.1-.056-.212-.14-.374-.264zm2.732 0c.397-.303 1.003-.719 1.473-1.232c.497-.541.911-1.255.911-2.203h-1.5c0 .464-.189.832-.516 1.19c-.353.384-.791.681-1.278 1.052zM22.75 9.7c0-1-.585-1.875-1.44-2.253c-.896-.397-1.973-.207-2.842.668l1.064 1.057c.48-.483.904-.471 1.17-.353a.955.955 0 0 1 .548.88zm-3.294 2.242a3.584 3.584 0 0 1-.374.264c-.099.056-.116.044-.082.044v1.5c.334 0 .617-.123.82-.239c.204-.115.398-.263.546-.376z" />
                        </g>
                    </svg></i>
                <p>
                    Magang
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/tugas_pegawai" class="nav-link {{ $tittle === 'Tugas' ? 'active' : '' }}">
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
            <a href="/aktivitas_mhsw" class="nav-link {{ $tittle === 'Aktivitas Mahasiswa' ? 'active' : '' }}">
                <i class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5">
                            <path d="M17 12h-2l-2 5l-2-10l-2 5H7" />
                            <path
                                d="M3 12c0-4.243 0-6.364 1.318-7.682C5.636 3 7.758 3 12 3c4.243 0 6.364 0 7.682 1.318C21 5.636 21 7.758 21 12c0 4.243 0 6.364-1.318 7.682C18.364 21 16.242 21 12 21c-4.243 0-6.364 0-7.682-1.318C3 18.364 3 16.242 3 12" />
                        </g>
                    </svg></i>
                <p>
                    Aktivitas Mahasiswa
                </p>
            </a>
        </li>
    </ul>
</nav>
{{-- {{ Request::is('beranda/*') ? 'active' : '' }} --}}
