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
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary margin-btn margin-top-100" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Tambah Paket
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Paket Laundry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('laundry.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <input type="text" name="nama_paket" class="form-control @error('nama_paket') is-invalid  @enderror" value="{{ old('nama_paket') }}">
                                @error('nama_paket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
                <tr>
                    <thead>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Aksi</th>
                    </thead>
                </tr>

                <tbody>
                    <?php
                        $no =1;
                    ?>
                    @forelse ($paket_laundry as $pl)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $pl->nama_paket }}</td>
                            <td>
                                {{-- <a href="{{ url('jenis-laundry/'. $pl->id_pkt_lndry) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> --}}
                                <a href="{{ url('paket-laundry/'. $pl->id_pkt_lndry . '/edit') }}" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                                <form action="{{ url('paket-laundry/'. $pl->id_pkt_lndry) }}" method="post" class="d-inline">
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
                            <td colspan="3" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

