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
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card margin-top-100">
                    <div class="card-header bg-warning text-center">
                        Edit Jenis Laundry
                    </div>
                    <div class="card-body">
                        <form action="{{ url('jenis-laundry/'. $jenis_laundry->id_jns_lndry) }}" method="post">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label>Jenis Laundry</label>
                                <input type="text" name="jenis_laundry" class="form-control" value="{{$jenis_laundry->jenis_laundry}}">
                            </div>
                            <div class="form-group">
                                <label>Harga /Kg</label>
                                <input type="text" id="harga" name="harga" class="form-control" value="{{$jenis_laundry->harga}}">
                            </div>

                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection