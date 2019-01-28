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
      {!! Form::open(['id' => 'form', 'class' => 'form-horizontal','route' => 'changeprofile','method' => 'PUT']) !!}
        <label class="section-title">Ubah Profile</label>
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Enter firstname">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Enter lastname">
              </div>
            </div>
            <div class="col-lg-8">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Enter address">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Jenis Kelamin: <span class="tx-danger">*</span></label>
                {!! Form::select('gender', ['L' => 'Laki Laki', 'P' => 'Perempuan'], Auth::user()->gender, 
                            ['placeholder' => 'Pilih Jenis Kelamin','class' => 'form-control']) !!}
              </div>
            </div>
          </div>

          <div class="form-layout-footer">
            <button class="btn btn-primary bd-0">Ubah Profile</button>
            <a href="{{ route('myprofile') }}" class="btn btn-secondary bd-0">Cancel</a>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
@endsection
