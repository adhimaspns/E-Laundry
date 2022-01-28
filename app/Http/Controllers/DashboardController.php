<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return $hari_ini = date('Y-m-d', 'H:i:s');
        //! Query
        $total_transaksi  = Transaksi::where('created_at', '>=', Carbon::today())->count(); 
        $transaksi_proses = Transaksi::where('created_at', '>=', Carbon::today())->where('status', 'Diproses')->count(); 
        $transaksi_sukses = Transaksi::where('created_at', '>=', Carbon::today())->where('status', 'Sukses')->count(); 

        return view('pages.home', compact('total_transaksi', 'transaksi_proses', 'transaksi_sukses'));
    }
}
