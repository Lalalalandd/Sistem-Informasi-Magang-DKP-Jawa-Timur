<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tittle }}</title> <!-- Perbaikan pada variabel title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        @media print {
            .print-hide {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-12 d-flex justify-content-end my-4 print-hide">
            <a href="{{ url()->previous() }}" class="btn btn-secondary me-2 ">Kembali</a>
            <button class="btn btn-primary me-2" onclick="window.print()"><i class="me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 28 28"><path fill="currentColor" d="M7.004 5.765V7H6a4 4 0 0 0-4 4v7a3 3 0 0 0 3 3h2v1a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-1h2a3 3 0 0 0 3-3v-7a4 4 0 0 0-4-4h-1V5.752a2.75 2.75 0 0 0-2.754-2.75l-8.496.013a2.75 2.75 0 0 0-2.746 2.75M19.5 5.752V7H8.504V5.765c0-.69.558-1.249 1.248-1.25l8.496-.013a1.25 1.25 0 0 1 1.252 1.25M10 15.5h8a1.5 1.5 0 0 1 1.5 1.5v5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 8.5 22v-5a1.5 1.5 0 0 1 1.5-1.5"/></svg>
            </i>
                Print</button>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Bukti</th>
                <th>Presensi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $x = 1;
                use Carbon\Carbon;
            @endphp


            @foreach ($magang as $d)
                <tr>
                    <td>{{ $x++ }}</td> <!-- Menggunakan sintaks Blade untuk increment x -->
                    <td>{{ Carbon::parse($d->tanggal)->format('d M Y') }}</td>
                    <!-- Mengakses properti tanggal dari objek $d -->
                    <td>
                        <img src="{{ Storage::url($d->bukti) }}" alt=""
                            style="max-height: 80px; max-width: 80px;">
                    </td> <!-- Isi bagian ini sesuai kebutuhan -->
                    <td>{{ ucfirst($d->presensi) }}</td> <!-- Isi bagian ini sesuai kebutuhan -->
                    <td>{{ ucfirst($d->status) }}</td> <!-- Isi bagian ini sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
