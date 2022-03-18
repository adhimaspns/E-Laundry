@extends('layouts.app')
@section('title-page', 'Transaksi')
@section('transaksi', 'active')

@push('css-prepend')
    <link rel="stylesheet" href="{{ URL::asset('addon/datatables/css/dataTables.min.css') }}">
@endpush

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body margin-top-100">
                <!-- Button trigger modal -->
                @if ($transaksi > 100)
                    <button type="button" class="btn btn-primary margin-btn" disabled>
                        <i class="fa fa-plus"></i> Transaksi
                    </button>
                    <small class="text-danger">* Jumlah melebihi kuota harian yaitu 100Kg</small>
                @else
                    <button type="button" class="btn btn-primary margin-btn" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> Transaksi
                    </button>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('transaksi') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Pilihan Paket</label>
                                        <select name="id_pkt_lndry" class="form-control @error('nama_paket') is-invalid  @enderror">
                                            <option value="">=== Pilih Paket ===</option>
                                            @foreach ($paket_laundry as $pktl)
                                                @if (Request::old('id_pkt_lndry') == $pktl->id_pkt_lndry)
                                                    <option value="{{ $pktl->id_pkt_lndry }}" selected>{{ $pktl->nama_paket }}</option>
                                                @else
                                                    <option value="{{ $pktl->id_pkt_lndry }}">{{ $pktl->nama_paket }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input type="text" name="nama_customer" class="form-control @error('nama_customer') is-invalid  @enderror" value="{{ old('nama_customer') }}">
                                        @error('nama_customer')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid  @enderror" placeholder="min:11" value="{{ old('no_telp') }}">
                                        @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" placeholder="Dsn. Mlaten Ds. Mlaten RT/RW 001/002">{{ old('no_telp') }}</textarea>
                                        @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Lanjut</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped table-bordered" id="transaksi-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Customer</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Tanggal Masuk</th>
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
            ajax: "{{ url('transaksi-json') }}",
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
                {data: 'status',        name: 'status'},
                {data: 'grand_total',   name: 'grand_total'},
                {data: 'created_at',   name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush