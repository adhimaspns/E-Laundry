@extends('layouts.checkout')
@section('title-page', 'Transaksi')
@section('transaksi', 'active')

@push('css-prepend')
    <style>
        body {
            height: 1000px;
        }
    </style>
@endpush

@push('js-prepend')
    <script src="{{ URL::asset('addon/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('addon/js/jquery.maskMoney.min.js') }}"></script>

    <script>
        $('#harga').maskMoney({prefix:'Rp. ',allowNegative:false,thousand:'.',decimal:'.',precision:0,affixesStay:false});
    </script>
@endpush

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-lg-6 margin-top-50">
            <div class="card">
                <div class="card-header text-center">
                    Jenis Laundry
                </div>
                <div class="card-body">
                    <form action="{{ route('detail-transaksi.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <label>Jenis Laundry</label>
                                <select name="id_jns_lndry" class="form-control  @error('id_jns_lndry') is-invalid @enderror">
                                    @foreach ($jenis_laundry as $jl)
                                        @if (Request::old('id_jns_lndry') == $jl->id_jns_lndry)
                                            <option value="{{ $jl->id_jns_lndry }}" selected>{{ $jl->jenis_laundry }} | Rp. {{ number_format($jl->harga,0,',','.' ) }}</option>
                                        @else
                                            <option value="{{ $jl->id_jns_lndry }}">{{ $jl->jenis_laundry }} | Rp. {{ number_format($jl->harga,0,',','.' ) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_jns_lndry')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Jumlah</label>
                                <input type="text" name="jml" class="form-control  @error('jml') is-invalid @enderror" value="{{ old('jml') }}">
                                @error('jml')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Hidden -->
                        <input type="hidden" name="no_transaksi" value="{{ $transaksi->no_transaksi}}">
                        <input type="hidden" name="id_pkt_lndry" value="{{ $paket_laundry->id_pkt_lndry}}">

                        <br>
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </form>
                </div>  
            </div>
        </div> --}}

        <div class="col-lg-8">
            <div class="card margin-top-50">
                <div class="card-header text-center">
                    <b>Invoice</b>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Nama </td>
                            <td>: {{$transaksi->nama_customer}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Transaksi</td>
                            <td>: {{$transaksi->no_transaksi}}</td>
                        </tr>
                        <tr>
                            <td>Paket Laundry</td>
                            <td>: {{$paket_laundry->nama_paket}}</td>
                        </tr>
                    </table>

                    <hr>

                    <form action="{{ route('detail-transaksi.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Jenis Laundry</label>
                            <select name="id_jns_lndry" class="form-control  @error('id_jns_lndry') is-invalid @enderror">
                                @foreach ($jenis_laundry as $jl)
                                    @if (Request::old('id_jns_lndry') == $jl->id_jns_lndry)
                                        <option value="{{ $jl->id_jns_lndry }}" selected>{{ $jl->jenis_laundry }} | Rp. {{ number_format($jl->harga,0,',','.' ) }}</option>
                                    @else
                                        <option value="{{ $jl->id_jns_lndry }}">{{ $jl->jenis_laundry }} | Rp. {{ number_format($jl->harga,0,',','.' ) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_jns_lndry')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jml" class="form-control  @error('jml') is-invalid @enderror" value="{{ old('jml') }}">
                            @error('jml')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="no_transaksi" value="{{ $transaksi->no_transaksi}}">
                        <input type="hidden" name="id_pkt_lndry" value="{{ $paket_laundry->id_pkt_lndry}}">

                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </form>

                    <hr>

                    <form action="{{ url('checkout') }}" method="POST">
                        @csrf
                        <p class="lead">Layanan Antar Jemput Cucian <i>(optional)</i> </p>
    
                        <div class="row">
                            <div class="col">
                                <label>Jarak (Km)</label>
                                <input type="number" min="1" name="jarak" class="form-control" placeholder="1">
                                <p class="text-muted">
                                    Ongkir Rp. 2.500/Km
                                </p>
                            </div>
                        </div>
    
                        <!-- Hidden -->
                        <input type="hidden" name="no_transaksi" value="{{ $transaksi->no_transaksi }}">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success ">
                        Checkout
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 margin-top-50">
            <div class="card">
                <div class="card-body">
                    <h2>Detail Jenis Laundry</h2>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Laundry</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            @forelse ($detail_transaksi as $dt)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $dt->jns_lndry->jenis_laundry }}</td>
                                    <td>{{ $dt->jml }}</td>
                                    <td>{{ number_format($dt->harga,0,',','.' ) }}</td>
                                    <td>{{ number_format($dt->subtotal,0,',','.' ) }}</td>
                                    <td>
                                        <form action="{{ url('detail-transaksi/' . $dt->id_dtl_transaksi ) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            ?>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="4" class="bg-success text-center text-white">Total</td>
                                <td colspan="2" class="bg-success text-white">: Rp. {{ number_format($grand_total, 0, ',', '.' ) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ url('transaksi') }}" class="btn btn-secondary" style="margin-top: 20px;">
                Kembali
            </a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade"id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('checkout') }}" method="POST">
                    @csrf
                    <div class="form-input">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control" value="<?php echo date("Y-m-d")?>" readonly>
                    </div>
                    <div class="form-input">
                        <label>Tanggal Keluar</label>
                        <input type="date" name="tgl_keluar" class="form-control" required>
                    </div>

                    <hr>
                    <p class="lead text-center">Layanan Antar Jemput Cucian <i>(optional)</i> </p>

                    <div class="row">
                        <div class="col">
                            <label>Jarak (Km)</label>
                            <input type="number" min="1" name="jarak" class="form-control" placeholder="1">
                        </div>
                        <div class="col">
                            <label>Rupiah</label>
                            <input type="text" id="harga" name="rupiah" class="form-control">
                        </div>
                    </div>

                    <!-- Hidden -->
                    <input type="hidden" name="no_transaksi" value="{{ $transaksi->no_transaksi }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection