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
            <table id="dataTable" class="table display responsive nowrap">
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
@push('scripts')
<script src="{{ asset('theme/js/scripts.js') }}"></script>
<script>
    $( document ).ready(function() {

        var dt = $('#dataTable').DataTable({
            orderCellsTop: true,
            responsive: true,
            processing: true,
            serverSide: true,
            searching: true,
            autoWidth: false,
            ajax: {
                    url :"{{ route('property.causes.list') }}",
                    data: { '_token' : "{{ csrf_token() }}"},
                    type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, "width": "30px"},
                { data: 'property_code', name: 'property_code' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', "width" : "100px", orderable: false }
            ]
        });

        $('table#dataTable tbody').on( 'click', 'td button', function (e) {
            var mode = $(this).attr("data-mode");
            var parent = $(this).parent().get( 0 );
            var parent1 = $(parent).parent().get( 0 );
            var row = dt.row(parent1);
            var data = row.data();

            if($(this).hasClass('delete')) {
                swal({   
                    title: "Hapus",   
                    text: "Apakah Anda Yakin Untuk Menghapus Data Ini ?",   
                    type: "warning",   
                    showCancelButton: true,
                    cancelButtonText: "No",   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Ya Saya Yakin",   
                    closeOnConfirm: true 
                }, function(){
                    $('.preloader').show();
                    remove(data.id,"{{ route('property.causes.delete') }}", "{{ csrf_token() }}")   
                    .then((result) => {
                        $('.preloader').hide();
                        $.toast({
                            heading: 'Success !!',
                            text: result.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3500, 
                            stack: 6
                        });
                        $('#dataTable').DataTable().ajax.reload();
                    })
                    .catch((err) => {
                        $('.preloader').hide();
                        $.toast({
                            heading: 'Error !!!',
                            text: err.responseJSON.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                        });
                        $('#dataTable').DataTable().ajax.reload();
                    })
                });
                
            }else {
                $('#id').val(data.id);
                $('#type').val('PUT');
                $('#code_name').val(data.code_name);
                $('#name').val(data.name);
                $('#modalForm').modal('show');
            }
        });
        
        $("#form").find("input,textarea,select").jqBootstrapValidation(
            {
                preventSubmit: true,
                submitError: function($form, event, errors) {

                },
                submitSuccess: function($form, event) {
                    $('.preloader').show();
                    event.preventDefault();
                    const data = $('#form').serialize();
                    if($('#type').val() === 'POST')
                    {
                        save(data,"{{ route('property.causes.save') }}", "{{ csrf_token() }}")
                        .then((result) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Success !!',
                                text: result.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'success',
                                hideAfter: 3500, 
                                stack: 6
                            });
                            $('#dataTable').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Error !!!',
                                text: err.responseJSON.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                            });
                            $('#dataTable').DataTable().ajax.reload();
                        })
                    } else {
                        update(data,"{{ route('property.causes.update') }}","{{ csrf_token() }}")
                        .then((result) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Success !!',
                                text: result.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'success',
                                hideAfter: 3500, 
                                stack: 6
                            });
                            $('#type').val('POST');
                            $('#dataTable').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Error !!!',
                                text: err.responseJSON.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                            });
                            $('#type').val('POST');
                            $('#dataTable').DataTable().ajax.reload();
                        })
                    }
                },
                filter: function() {
                    return $(this).is(":visible");
                }
            }
        );
    });
</script>
@endpush