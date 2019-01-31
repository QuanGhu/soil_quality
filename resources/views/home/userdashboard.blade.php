<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Hasil Analisa Terakhir</h4>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
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
        </div>
    </div>
</div>
