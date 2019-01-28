@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','History Penilaian Tanah')
@section('content')
    <div class="section-wrapper">
        <label class="section">List History Penilaian Tanah</label>
        <div class="mg-b-20 pull-right">
            <a href="{{ route('customer.new') }}" class="btn btn-primary">Buat Analisa Baru</a>
        </div>
        <div class="mg-b-20">
            <a target="_blank" href="{{ route('customer.print.list') }}" class="btn btn-primary">Cetak Tabel</a>
        </div>
        <div class="table-wrapper">
            <table id="dataTable" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penilaian</th>
                        <th>Kemungkinan Sifat Tanah</th>
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
                    url :"{{ route('customer.result.list') }}",
                    data: { '_token' : "{{ csrf_token() }}"},
                    type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, "width": "30px"},
                { data: 'created_at', name: 'created_at' },
                { data: 'result', name: 'result' },
                { data: 'action', name: 'action', "width" : "100px", orderable: false }
            ]
        });
        
    });
</script>
@endpush
