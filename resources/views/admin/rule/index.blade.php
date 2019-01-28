@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Aturan Sifat Tanah</li>
</ol>
@endsection
@section('page_title','Sifat Tanah')
@section('content')
    <div class="section-wrapper">
        <label class="section">Aturan Sifat Tanah</label>
        <div class="mg-b-20 pull-right">
            
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
        
    });
</script>
@endpush