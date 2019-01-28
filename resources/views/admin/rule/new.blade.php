@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','Ketentuan Sifat Tanah Baru')
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
        {!! Form::open(['id' => 'form', 'class' => 'form-horizontal','route' => 'property.rule.save']) !!}
        <label class="section-title">Isian Kriteria Berdasarkan Sifat Tanah</label>
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Sifat Tanah: <span class="tx-danger">*</span></label>
                {!! Form::select('soil_properties_id', $properties, null, 
                    ['id' => 'soil_properties_id', 'placeholder' => 'Pilih Sifat Tanah','class' => 'form-control']) !!}
              </div>
            </div>
          </div>

          <p class="mg-b-20 mg-sm-b-40">Pilihlah beberapa kriteria berikut yang sesuai dengan sifat tanah</p>
          <div class="row mg-b-25">
            @foreach($criterias as $criteria)
                <div class="col-lg-3">
                    <label class="ckbox">
                        <input name="soil_criteria_id[]" type="checkbox" value="{{ $criteria->id }}">
                        <span>
                            {{ $criteria->name }}
                        </span>
                    </label>
                </div>
            @endforeach
          </div>

          <div class="form-layout-footer">
            <button type="submit" class="btn btn-primary bd-0">Simpan</button>
            <a href="{{ route('property.rule.index') }}" class="btn btn-secondary bd-0">Batal</a>
          </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
