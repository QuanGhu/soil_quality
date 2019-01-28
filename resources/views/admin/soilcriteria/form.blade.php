<div id="modalForm" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Kriteria Tanah</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['id' => 'form', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('id', null,['id' => 'id']) !!}
                {!! Form::hidden('type', 'POST',['id' => 'type']) !!}
                <div class="modal-body pd-25">
                    <div class="control-group">
                        <label class="control-label">Kode</label>
                        <div class="controls">
                            {!! Form::text('code_name',null,['id' => 'code_name','class' => 'form-control','required','pattern' => '^[a-zA-Z0-9\s]+$',
                                'data-validation-pattern-message' => 'Mohon masukan data dengan benar', 
                                'data-validation-required-message' => 'Tulis Kode Disini']) !!}
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            {!! Form::text('name',null,['id' => 'name','class' => 'form-control','required','pattern' => '^[a-zA-Z\s]+$',
                                'data-validation-pattern-message' => 'Mohon masukan data dengan benar', 
                                'data-validation-required-message' => 'Tulis Kode Disini']) !!}
                            <p class="help-block"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>