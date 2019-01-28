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
    <div class="section-wrapper">
      {!! Form::open(['id' => 'form', 'class' => 'form-horizontal','route' => 'customer.analyze']) !!}
        <label class="section-title">Formulir Penilaian Sifat Tanah</label>
        <p class="mg-b-20 mg-sm-b-40">Informasi Data Diri</p>
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Nama Lengkap:</label>
                <p class="form-control-label" style="color: #000">{{ Auth::user()->name }}</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Email : </label>
                <p class="form-control-label" style="color: #000">{{ Auth::user()->email }}</p>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Alamat: </label>
                <p class="form-control-label" style="color: #000">{{ Auth::user()->address }}</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Jenis Kelamin:</label>
                <p class="form-control-label" style="color: #000">{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}</p>
              </div>
            </div>
          </div>

          <p class="mg-b-20 mg-sm-b-40">Kriteria Yang Dipilih</p>
          <div class="row mg-b-25">
            @foreach($anaylze->subAnalyzes as $subanalyze)
                <div class="col-md-3">
                    <span style="color: #000">{{ $subanalyze->soil_criteria }}</span>
                </div>
            @endforeach
          </div>

          <div class="mg-b-20 mg-sm-b-40"></div>

          <p class="mg-b-20 mg-sm-b-40">Hasil Analisa Sifat Tanahnya Adalah</p>
            <h3 class="mg-b-20 mg-sm-b-40">{{ $anaylze->result }}</h3>
          
          <div class="form-layout-footer">
            <a href="{{ route('customer.index') }}" class="btn btn-secondary bd-0">Kembali</a>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
@endsection
