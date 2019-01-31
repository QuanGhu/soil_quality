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
    <table class="table table-bordered">
        <tr>
            <td colspan="2" class="text-center">HASIL ANALISA TANAH</td>
        </tr>
        <tr>
            <td colspan="2">DATA PEMILIK :</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ Auth::user()->address }}</td>
        </tr>
        <tr>
            <td colspan="2">KRITERIA YANG DIPILIH :</td>
        </tr>
        <tr>
            <td colspan="2">
                @foreach($anaylze->subAnalyzes as $subanalyze)
                    <div class="col-md-3">
                        <span style="color: #000">{{ $subanalyze->soil_criteria }}</span>
                    </div>
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="2">HASIL ANALISA TERAKHIR :</td>
        </tr>
        <tr>
            <td>Sifat Tanah</td>
            <td>{{ $anaylze->result }}</td>
        </tr>
        <tr>
            <td>Penyebab</td>
            <td>
                <ul>
                    @foreach($property->causes as $cause)
                        <li>{{ $cause->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>Solusi</td>
            <td>
                <ul>
                    @foreach($property->solutions as $solution)
                        <li>{{ $solution->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
</body>
</html>