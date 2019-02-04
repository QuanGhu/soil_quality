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
      <div class="row mg-t-10">
        <div class="col-md-12">
            <a target="_blank" href="{{ route('customer.index') }}" class="btn btn-default pull-right">Cancel</a>
        </div>
        <div class="col-md-12">
          {{-- <h4>Isian Analisa Tanah</h4> --}}
          <p class="mg-b-20 mg-sm-b-40">Silakan Isi Informasi Data Diri</p>
        </div>
        <div>
            <div class="col-md-6">
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
                  <input class="form-control" type="text" name="gender" value="{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}" placeholder="Enter address">
                </div>
              </div>
              <div class="row mg-t-35">
                <div class="col-md-12">
                    <a href="{{ route('customer.new') }}" class="btn btn-primary pull-right" style="float:right;">Lanjutkan</a>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
