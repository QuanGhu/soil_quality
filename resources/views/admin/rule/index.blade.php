@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Aturan Sifat Tanah</li>
</ol>
@endsection
@section('page_title','Sifat Tanah')
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
        <label class="section">Aturan Sifat Tanah</label>
        <div class="mg-b-20 pull-right">
            <a href="{{ route('property.rule.new') }}" class="btn btn-primary">Tambah Ketentuan Baru</a>
        </div>
        <div class="table-wrapper">
            <table id="dataTable" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Sifat</th>
                        <th>Nama</th>
                        <th>Ketentuan</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
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
                    url :"{{ route('property.rule.list') }}",
                    data: { '_token' : "{{ csrf_token() }}"},
                    type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, "width": "30px"},
                { data: 'code_name', name: 'code_name' },
                { data: 'name', name: 'name' },
                { data: 'rule', name: 'rule' },
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
                    remove(data.id,"{{ route('property.rule.delete') }}", "{{ csrf_token() }}")   
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
                
            }
        });
        
    });
</script>
@endpush