@extends('layouts.app')
@section('title-page', 'Laporan')
@section('laporan', 'active')

@push('css-prepend')
    <link rel="stylesheet" href="{{ URL::asset('addon/datatables/css/dataTables.min.css') }}">
@endpush

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 margin-top-50">  
            <div class="card">
                <div class="card-header text-center">
                    Cetak Laporan 
                </div>
                <div class="card-body">
                    <form action="{{ url('export-pdfbydate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tgl_awal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-body margin-top-100">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped table-bordered" id="transaksi-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Customer</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js-prepend')
<script src="{{ URL::asset('addon/datatables/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ URL::asset('addon/datatables/js/jquery.dataTables.min.js') }}" defer></script>


<script>
    $(function() {
        $('#transaksi-table').DataTable({
            processing: true,
            serverSide: true,
            paging    : true,
            autoWidth : false,  
            responsive: true, 
            ajax: "{{ url('laporan-json') }}",
            columns: [
                { "data": null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },

                {data: 'no_transaksi',  name: 'no_transaksi'},
                {data: 'nama_customer', name: 'nama_customer'},
                {data: 'status',        name: 'status'},
                {data: 'grand_total',   name: 'grand_total'},
                {data: 'created_at',    name: 'created_at'},
                {data: 'tgl_akhir',     name: 'tgl_akhir'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush