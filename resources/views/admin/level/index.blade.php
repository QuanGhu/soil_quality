@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Level Pengguna</li>
</ol>
@endsection
@section('page_title','Data Level Pengguna')
@section('content')
    <div class="container">
        <div class="row mg-t-10">
            <div class="col-md-12">
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalForm">Tambah Data</a>
            </div>
            <div class="col-md-12">
                <h4>Data Level Pengguna</h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.level.form')
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
                    url :"{{ route('admin.level.list') }}",
                    data: { '_token' : "{{ csrf_token() }}"},
                    type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, "width": "30px"},
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
                    remove(data.id,"{{ route('admin.level.delete') }}", "{{ csrf_token() }}")   
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
                        save(data,"{{ route('admin.level.save') }}", "{{ csrf_token() }}")
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
                        update(data,"{{ route('admin.level.update') }}","{{ csrf_token() }}")
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