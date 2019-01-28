<div class="row">
    <div class="col-md-12">
        <div class="card card-table">
            <div class="card-header">
                <h6 class="slim-card-title">Hasil Analisa Terakhir</h6>
            </div><!-- card-header -->
            <div class="table-responsive">
                <table class="table mg-b-0 tx-13">
                    <thead>
                        <tr class="tx-10">
                            <th class="wd-10p pd-y-5">No</th>
                            <th class="pd-y-5">Tanggal</th>
                            <th class="pd-y-5">Kemungkinan Sifat Tanah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anaylises as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->result }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    Anda Belum Melakukan Analisa
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div><!-- table-responsive -->
            <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <a href="{{ route('customer.index') }}"><i class="fa fa-angle-down mg-r-5"></i>Lihat Semua Data</a>
            </div><!-- card-footer -->
        </div>
    </div>
</div>