@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','History Penilaian Tanah')
@section('content')
    <div class="section-wrapper">
        <label class="section">List History Penilaian Tanah</label>
        <div class="mg-b-20 pull-right">
            <a href="{{ route('customer.new') }}" class="btn btn-primary">Ajukan Penilaian Baru</a>
        </div>
        <div class="table-wrapper">
            <table id="dataTable" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penilaian</th>
                        <th>pH Tanah</th>
                        <th>Kemungkinan Sifat Tanah</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
