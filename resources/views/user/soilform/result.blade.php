@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','Formulir Baru Penilaian Tanah')
@section('content')
    @if (session()->has('danger'))
        <div class="alert alert-danger">
            <strong>Error!</strong>
            {{ session()->get('danger') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>Success!</strong>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('customer.index') }}" class="btn btn-default bd-0">Kembali</a>
            </div>
            <div class="col-md-6">
                <a target="_blank" href="{{ route('customer.print.detail', $anaylze->id) }}" class="btn btn-primary pull-right">Cetak Data</a>
            </div>
            <div class="col-md-12 mg-t-10">
                <table class="table table-bordered">
                    <tr style="background-color: #9ecbd0;">
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
                    <tr style="background-color: #9ecbd0;">
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
                    <tr style="background-color: #9ecbd0;">
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
            </div>
        </div>
    </div>
@endsection
