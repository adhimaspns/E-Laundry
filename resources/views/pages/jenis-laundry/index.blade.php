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
                <table class="table table-striped table-hover margin-top-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @forelse ($paket_laundry as $pl)
                            
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $pl->nama_paket}}</td>
                                <td>
                                    <a href="{{ url('jenis-laundry/' . $pl->id_pkt_lndry) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
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