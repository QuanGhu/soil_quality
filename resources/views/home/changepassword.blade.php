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
      {!! Form::open(['id' => 'form', 'class' => 'form-horizontal','route' => 'changepassword.process','method' => 'PUT']) !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        <label class="section-title">Ubah Password</label>
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Password Lama: <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="old_password">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Password Baru : <span class="tx-danger">*</span></label>
                <input class="form-control" type="password" name="new_password">
              </div>
            </div>
          </div>

          <div class="form-layout-footer">
            <button class="btn btn-primary bd-0">Ubah Password</button>
            <a href="{{ route('home') }}" class="btn btn-secondary bd-0">Cancel</a>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
@endsection
