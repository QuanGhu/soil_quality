<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        table {
            border-collapse: collapse;
        }
        .table thead > tr > th, .table thead > tr > td, .table tfoot > tr > th, .table tfoot > tr > td {
            border-top: 0;
            border-bottom: 0;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            background-color: #dee2e6;
            color: #343a40;
            letter-spacing: 0.5px;
        }
        .table tbody > tr > th {
            color: #343a40;
            font-weight: 500;
        }
        .table th, .table td {
            border-top-color: #dee2e6;
            color: #5b636a;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Laporan Detail Penilaian Tanah</h1>
    <p style="margin-bottom : 20px; margin-top : 40px;">Informasi Data Diri</p>
    <table class="table mg-b-0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ Auth::user()->email }}</td>
                <td>{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                <td>{{ Auth::user()->address }}</td>
            </tr>
        </tbody>
    </table>
    <p style="margin-bottom : 20px; margin-top : 40px;">Kriteria Yang Dipilih</p>
    <table class="table mg-b-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->subAnalyzes as $key => $analyze)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $analyze->soil_criteria }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-bottom : 20px; margin-top : 40px;">Hasil Analisa Tanah Anda Kemungkinan Bersifat</p>
    <h2>{{ $data->result }}</h2>
</body>
</html>