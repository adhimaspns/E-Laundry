<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\DetailLaporan;
use App\Models\DetailTransaksi;
use App\Models\JenisLaundry;
use DataTables;
use App\Models\Laporan;
use App\Models\PaketLaundry;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.laporan.index');
    }

    public function laporan_json()
    {
        $data_laporan = Laporan::where('status', 'Sukses')->orderBy('id_laporan', 'DESC')->get();
        return DataTables::of($data_laporan)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $button = '<a href="laporan/'.$data->no_transaksi.'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                    $button .= '&nbsp;&nbsp;'; 
                    // $button .= '<a href="export-excel/'. $data->no_transaksi.'" class="btn btn-danger btn-sm "><i class="fas fa-file-pdf"></i> Export</a>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->addColumn('created_at', function($data){
                    return date('d M Y - H:i:s', strtotime($data->created_at));
                })
                ->addColumn('tgl_akhir', function($data){
                    return date('d M Y - H:i:s', strtotime($data->tgl_akhir));
                })
                ->addColumn('grand_total', function($data){
                    return "Rp. ". number_format($data->grand_total,0,',','.');
                })
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi          = Transaksi::where('no_transaksi', $id)->first();
        $detail_transaksi   = DetailTransaksi::where('transaksi_id', $id)->with(['jns_lndry'])->get();
        $paket_laundry      = PaketLaundry::where('id_pkt_lndry', $transaksi->pkt_lndry_id)->first();
        $jenis_laundry      = JenisLaundry::where('paket_laundry_id', $paket_laundry->id_pkt_lndry)->get();
        $laporan            = Laporan::where('no_transaksi', $id)->first();

        return view('pages.laporan.detail', compact('transaksi', 'detail_transaksi', 'paket_laundry', 'jenis_laundry', 'laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export_excel($no_transaksi)
    {
        $data_laporan   = Laporan::where('no_transaksi', $no_transaksi)->where('status', 'Sukses')->get();
        $detail_laporan = DetailLaporan::where('transaksi_id', $no_transaksi)->get();

        //! Export Excel
        // return Excel::download(new Laporan, 'laporan.xlsx');
        return view('pages.laporan.excel', compact('data_laporan'));
    }

    public function export_pdf_date(Request $request)
    {
        $tgl_awal       = $request->tgl_awal;
        $tgl_akhir      = $request->tgl_akhir;

        //! Query 
        $data_laporan   = Laporan::whereDate('created_at', '>=', $tgl_awal)->whereDate('created_at', '<=', $tgl_akhir)->where('status', 'Sukses')->get(); 
        $sum            = Laporan::whereDate('created_at', '>=', $tgl_awal)->whereDate('created_at', '<=', $tgl_akhir)->where('status', 'Sukses')->sum('grand_total');

        $pdf            = PDF::loadview('pages.laporan.export_bydate', compact('data_laporan', 'sum', 'tgl_awal', 'tgl_akhir'));
        return $pdf->download('laporan-transaksi.pdf');
        // return view('pages.laporan.export_bydate', compact('data_laporan', 'sum', 'tgl_awal', 'tgl_akhir'));
    }
}
