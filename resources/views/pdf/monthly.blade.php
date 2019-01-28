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
    <h1 style="text-align: center">Laporan Daftar Penilaian Tanah Keseluruhan</h1>
    <table class="table mg-b-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Penilaian</th>
                <th>Hasil Penilaian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->created_at->format('d M Y') }}</td>
                    <td>{{ $data->result }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>