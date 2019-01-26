@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','Formulir Baru Penilaian Tanah')
@section('content')
    <div class="section-wrapper">
        <label class="section-title">Formulir Penilaian Sifat Tanah</label>
        <p class="mg-b-20 mg-sm-b-40">Informasi Data Diri</p>
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
                <input class="form-control" type="text" name="gender" value="{{ Auth::user()->gender == 'L' ? 'Laki Laki' : 'Perempuan' }}" placeholder="Enter address">
              </div>
            </div>
          </div>

          <p class="mg-b-20 mg-sm-b-40">Pilihlah beberapa pilihan berikut yang sesuai dengan kondisi tanah anda</p>
          <div class="row mg-b-25">
            @foreach($criterias as $criteria)
                <div class="col-lg-3">
                    <label class="ckbox">
                        <input type="checkbox">
                        <span>
                            {{ $criteria->name }}
                        </span>
                    </label>
                </div>
            @endforeach
          </div>

          <div class="form-layout-footer">
            <button class="btn btn-primary bd-0">Liat Hasil Penilaian</button>
            <a href="{{ route('customer.index') }}" class="btn btn-secondary bd-0">Cancel</a>
          </div>
        </div>
    </div>
@endsection
