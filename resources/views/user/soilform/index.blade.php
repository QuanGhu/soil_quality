@extends('layouts.master')
@section('breadcrumbs')
<ol class="breadcrumb slim-breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"></li>
</ol>
@endsection
@section('page_title','History Penilaian Tanah')
@section('content')
    <div class="container">
        <div class="row mg-t-10">
            <div class="col-md-6">
                <a target="_blank" href="{{ route('customer.print.list') }}" class="btn btn-default">Cetak Tabel</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('customer.new') }}" class="btn btn-primary pull-right">Buat Diagnosa Baru</a>
            </div>
            <div class="col-md-12">
                <h4>Riwayat Diagnosa Tanah</h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penilaian</th>
                                <th>Sifat Tanah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
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
