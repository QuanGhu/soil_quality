@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sifat Tanah</li>
</ol>
@endsection
@section('page_title','Sifat Tanah')
@section('content')
    <div class="section-wrapper">
        <label class="section">Data Penyebab Sifat Tanah</label>
        <div class="mg-b-20 pull-right">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Tambah Data</a>
        </div>
        <div class="table-wrapper">
            <table id="datatable" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Sifat Tanah</th>
                        <th>Nama Penyebab</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('admin.causes.form')
@endsection