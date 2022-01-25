@extends('layouts.app')
@section('title-page', 'Transaksi')
@section('transaksi', 'active')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card margin-top-100">
                <div class="card-header text-center">
                    Invoice
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>: {{ date('d M Y - H:i:s', strtotime($transaksi->created_at))  }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Transaksi</td>
                            <td>: {{ $transaksi->no_transaksi }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $transaksi->nama_customer }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>: {{ $transaksi->tgl_awal }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Keluar</td>
                            <td>: {{ $transaksi->tgl_akhir }}</td>
                        </tr>
                        <tr>
                            @if (! $transaksi->ongkir)
                                <td>Ongkir</td>
                                <td>: -</td>
                            @else
                                <td>Ongkir</td>
                                <td>: {{ number_format($transaksi->ongkir) }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Grand Total</td>
                            <td>: {{ number_format($transaksi->grand_total) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 margin-top-50">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Paket</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @forelse ($detail_transaksi as $jl)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $jl->jns_lndry->jenis_laundry }}</td>
                            <td>{{ number_format($jl->harga) }}</td>
                            <td>{{ $jl->jml }}</td>
                            <td>{{ number_format($jl->subtotal) }}</td>
                        </tr>
                    <?php
                        $no++;
                    ?>
                    @empty
                        <td colspan="5" class="text-center">
                            Data Kosong
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ url('transaksi') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>
@endsection