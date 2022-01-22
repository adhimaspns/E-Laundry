@extends('layouts.app')
@section('title-page', 'Jenis Laundry')
@section('settings', 'active')
@section('jenis-laundry', 'active')

@push('js-prepend')
    <script src="{{ URL::asset('addon/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('addon/js/jquery.maskMoney.min.js') }}"></script>

    <script>
        $('#harga').maskMoney({prefix:'Rp. ',allowNegative:false,thousand:'.',decimal:'.',precision:0,affixesStay:false});
    </script>
@endpush

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary margin-top-100 margin-btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Jenis Laundry
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Laundry</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('jenis-laundry.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Jenis Laundry</label>
                                        <input type="text" name="jenis_laundry" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga /Kg</label>
                                        <input type="text" id="harga" name="harga" class="form-control">
                                    </div>

                                    <!-- Hidden -->
                                    <input type="hidden" name="paket_lndry_id" value="{{ $paket_laundry->id_pkt_lndry }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Laundry</th>
                            <th>Harga /Kg</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @forelse ($jenis_laundry as $jl)
                            
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $jl->jenis_laundry}}</td>
                                <td>Rp. {{ number_format($jl->harga,0,',','.')}}</td>
                                <td>
                                    <a href="{{ url('jenis-laundry/' . $jl->id_pkt_lndry) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        ?>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection