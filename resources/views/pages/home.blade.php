@extends('layouts.app')
@section('dashboard', 'active')
@section('title-page', 'Dashboard')

@push('css-prepend')
    <link rel="stylesheet" href="{{ URL::asset('addon/datatables/css/dataTables.min.css') }}">
@endpush

@section('main-content')
    <div class="container">
        <h1 class="text-center margin-top-100">Transaksi Hari Ini</h1>
        <div class="row justify-content-center  margin-top-50">

            <div class="col-lg-4">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <h4>Transaksi Diproses</h4>
                        <h3>{{$transaksi_proses}}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h4>Transaksi Sukses</h4>
                        <h3>{{$transaksi_sukses}}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h4>Total Transaksi</h4>
                        <h3>{{$total_transaksi}}</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-top: 100px; margin-bottom: 100px;">
                <h2>Transaksi Hari Ini</h2>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped table-bordered" id="transaksi-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Customer</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Total</th>
                                <th>Tanggal Masuk</th>
                            </tr>
                        </thead>
                    </table>
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
            ajax: "{{ url('dashboard-transaksi') }}",
            columns: [
                { "data": null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },

                {data: 'no_transaksi',  name: 'no_transaksi'},
                {data: 'nama_customer', name: 'nama_customer'},
                {data: 'no_telp', name: 'no_telp'},
                {data: 'alamat', name: 'alamat'},
                {data: 'grand_total',   name: 'grand_total'},
                {data: 'created_at',   name: 'created_at'},
            ]
        });
    });
</script>
@endpush
