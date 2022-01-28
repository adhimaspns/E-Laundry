@extends('layouts.app')
@section('dashboard', 'active')
@section('title-page', 'Dashboard')

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
    </div>
@endsection

