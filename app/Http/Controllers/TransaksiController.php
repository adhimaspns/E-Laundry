<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use App\Models\DetailTransaksi;
use App\Models\JenisLaundry;
use App\Models\Laporan;
use App\Models\PaketLaundry;
use DataTables;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function index()
    {
        $paket_laundry = PaketLaundry::all();

        return view('pages.transaksi.index', compact('paket_laundry'));
    }

    public function transaksiJson()
    {
        $data_transaksi     = Transaksi::where('status', 'Diproses')->where('grand_total', '!=', null)->orderBy('id_transaksi', 'DESC')->get();
        return DataTables::of($data_transaksi)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $button = '<a href="transaksi/'.$data->no_transaksi.'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                    $button .= '&nbsp;&nbsp;'; 
                    $button .= '<a href="checkout/'. $data->no_transaksi.'" class="btn btn-success btn-sm "><i class="fas fa-dollar-sign"></i> Checkout</a>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->addColumn('created_at', function($data){
                    return date('d M Y - H:i:s', strtotime($data->created_at));
                })
                ->addColumn('grand_total', function($data){
                    return "Rp. ". number_format($data->grand_total,0,',','.');
                })
                ->make(true);
    }

    public function store(Request $request)
    {
        //! Validasi
        $rules  = [
            'id_pkt_lndry'    => 'required',
            'nama_customer'   => 'required',
        ];

        $pesan  = [
            'required'      => 'Harap isi bidang ini!'
        ];

        $this->validate($request, $rules, $pesan); 

        //! Buat Nomor Transaksi
        $hari_ini               = date('Ymd');
        $data_transaksi         = Transaksi::where('no_transaksi', 'LIKE', '%'.$hari_ini.'%')->max('no_transaksi');

        $akhir_no_transaksi     = substr($data_transaksi, 8, 4);
        $lanjut_no_urut         = $akhir_no_transaksi + 1;
        $no_transaksi_baru      = $hari_ini.sprintf('%04s', $lanjut_no_urut);

        //! Buat Data Transaksi
        $transaksi  = new Transaksi;

        $transaksi->no_transaksi    = $no_transaksi_baru;
        $transaksi->nama_customer   = $request->nama_customer;
        $transaksi->no_telp         = $request->no_telp;
        $transaksi->alamat          = $request->alamat;
        $transaksi->pkt_lndry_id    = $request->id_pkt_lndry;
        $transaksi->tgl_awal        = Carbon::now();
        $transaksi->status          = "Diproses";

        $transaksi->save();

        //! Buat Data Laporan
        Laporan::create([
            'no_transaksi'          => $no_transaksi_baru,
            'nama_customer'         => $request->nama_customer,
            'no_telp'               => $request->no_telp,
            'alamat'                => $request->alamat,
            'tgl_awal'              => Carbon::now(),
            'status'                => "Diproses"
        ]);

        return redirect('transaksi/checkout/'. $transaksi->no_transaksi)->with('success', 'Task Created Successfully!');
    }

    public function show($id)
    {
        $transaksi          = Transaksi::where('no_transaksi', $id)->first();
        $detail_transaksi   = DetailTransaksi::where('transaksi_id', $id)->with(['jns_lndry'])->get();
        $paket_laundry      = PaketLaundry::where('id_pkt_lndry', $transaksi->pkt_lndry_id)->first();
        $jenis_laundry      = JenisLaundry::where('paket_laundry_id', $paket_laundry->id_pkt_lndry)->get();

        return view('pages.transaksi.show', compact('transaksi', 'detail_transaksi', 'paket_laundry', 'jenis_laundry'));
    }
}
