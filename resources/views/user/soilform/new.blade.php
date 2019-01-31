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
      {!! Form::open(['id' => 'form','route' => 'customer.analyze']) !!}
      {!! Form::hidden('user_id', Auth::user()->id) !!}
      <div class="row mg-t-10">
        <div class="col-md-12">
            <a target="_blank" href="{{ route('customer.index') }}" class="btn btn-default pull-right">Cancel</a>
        </div>
        <div class="col-md-12">
          <h4>Isian Analisa Tanah</h4>
          <p class="mg-b-20 mg-sm-b-40">Informasi Data Diri</p>
        </div>
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
        <div class="col-md-12">
          <p class="mg-b-20 mg-sm-b-40">Jawablah beberapa pertanyaan berikut untuk menganalisa tanah anda</p>
          <div class="row">
            <div class="col-md-12">
                <div class="bs-wizard clearfix" style="display: none;">
                  @foreach($criterias as $key => $criteria)
                    <?php $aKey = '#step-'.$key; ?>
                    <?php $activeClass = $key == 0 ? 'bs-wizard-step setup-panel active' : 'bs-wizard-step setup-panel disabled'; ?>
                    <?php $firstClass = $key == 0 ? 'first-step bs-wizard-dot' : 'bs-wizard-dot'; ?>
                    <div class="{{ $activeClass }}">
                        <div class="text-center bs-wizard-stepnum">Basic Information</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="{{$aKey}}" class="{{ $firstClass }}"></a>
                    </div>
                  @endforeach
                </div>
            </div>
          </div>
          <?php $arrLength = count($criterias) - 1; ?>
          @foreach($criterias as $index => $criteria)
            <?php $stepId = 'step-'.$index; ?>
            <div class="setup-content" id="{{ $stepId }}">
              <p>Apakah Tanda Anda {{ $criteria->name }} ? </p>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group mg-t-10">
                      <select name="soil_criteria_id[]" class="form-control">
                        <option value="">Silakan Pilih Jawaban Anda</option>
                        <option value="{{ $criteria->id }}">IYA</option>
                        <option value="">TIDAK</option>
                      </select>
                    </div>
                </div>
              </div>
              <div class="row mg-t-35">
                  <div class="col-md-6">
                      <button class="btn btn-primary rounded prevBtn pull-left" type="button" style="float:left">Back</button> 
                  </div>
                  <div class="col-md-6">
                      @if($arrLength == $index)
                        <button type="submit" class="btn btn-primary pull-right" style="float:right;">Analisa</button>
                      @else
                        <button class="btn btn-primary rounded nextBtn pull-right" type="button" style="float:right">Next</button>
                      @endif
                  </div>
              </div>
            </div>
          @endforeach
          
          {{-- <div class="setup-content" id="step-2">
            <p>Step 2</p>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn_1 rounded prevBtn pull-right" type="button" style="float:left">Back</button> 
                </div>
                <div class="col-md-6">
                    <button class="btn btn_1 rounded nextBtn pull-right" type="button" style="float:right">Next</button> 
                </div>
            </div>
          </div>
          <div class="setup-content" id="step-3">
              <p>Step 3</p>
              <div class="row">
                  <div class="col-md-6">
                      <button class="btn btn_1 rounded prevBtn pull-right" type="button" style="float:left">Back</button> 
                  </div>
                  <div class="col-md-6">
                      <button class="btn btn_1 rounded nextBtn pull-right" type="button" style="float:right">Next</button> 
                  </div>
              </div>
            </div>
          <div class="setup-content" id="step-4">
            <p>Step 4</p>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn_1 rounded prevBtn pull-right" type="button" style="float:left">Back</button> 
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn_1 rounded pull-right" id="submitForm" style="float:right;">Submit to review</button>
                </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    {!! Form::close() !!}
    {{-- <div class="section-wrapper">
      {!! Form::open(['id' => 'form', 'class' => 'form-horizontal','route' => 'customer.analyze']) !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        <label class="section-title">Formulir Penilaian Sifat Tanah</label>
        <p class="mg-b-20 mg-sm-b-40">Informasi Data Diri</p>
        <div class="form-layout">
          

          <p class="mg-b-20 mg-sm-b-40">Pilihlah beberapa pilihan berikut yang sesuai dengan kondisi tanah anda</p>
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
            <button class="btn btn-primary bd-0">Liat Hasil Penilaian</button>
            <a href="{{ route('customer.index') }}" class="btn btn-secondary bd-0">Cancel</a>
          </div>
        </div>
      {!! Form::close() !!}
    </div> --}}
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script>
  $( document ).ready(function() {
    var navListItems = $('div.setup-panel a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');
    allPrevBtn = $('.prevBtn');
    
    allWells.hide();
    
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);
    
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    
    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel a[href="#' + curStepBtn + '"]').parent().next().children("a")        
        var locateForm = $("#step-1");
        locateForm.validator('validate');
        var locateErr = locateForm.find('.has-error');
        if (locateErr.length == 0) {
            nextStepWizard.removeAttr('disabled').trigger('click');
            nextStepWizard.parent().removeClass('disabled').addClass('active');
        }
    });
    
    allPrevBtn.click(function (){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel a[href="#' + curStepBtn + '"]').parent().prev().children("a")
            prevStepWizard.trigger('click');
    })
    
    $('div.setup-panel a.first-step').trigger('click');
});
</script>
@endpush
