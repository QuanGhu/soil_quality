@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
</ol>
@endsection
@section('page_title','Data Pengguna')
@section('content')
    <div class="section-wrapper">
        <label class="section">Data Pengguna Yang Terdaftar </label>
        <div class="table-wrapper">
            <table id="datatable" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection