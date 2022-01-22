@extends('layouts.app')
@section('title-page', 'Paket Laundry')
@section('settings', 'active')
@section('paket-laundry', 'active')

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
            <div class="col-lg-6">
                <div class="card margin-top-100">
                    <div class="card-header bg-warning text-center">
                        Edit Paket Laundry
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laundry.update', $paket_laundry->id_pkt_lndry) }}" method="post">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label>Nama Paket</label>
                                <input type="text" name="nama_paket" class="form-control" value="{{ $paket_laundry->nama_paket}}">
                            </div>

                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection