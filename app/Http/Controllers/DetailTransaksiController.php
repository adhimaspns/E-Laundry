<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DetailTransaksi;
use App\Models\JenisLaundry;
use App\Models\PaketLaundry;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function kasir($id)
    {
        //! Query
        $transaksi          = Transaksi::where('no_transaksi', $id)->first();
        $paket_laundry      = PaketLaundry::where('id_pkt_lndry', $transaksi->pkt_lndry_id)->first(); 
        $jenis_laundry      = JenisLaundry::where('paket_laundry_id', $paket_laundry->id_pkt_lndry)->get();
        $detail_transaksi   = DetailTransaksi::where('transaksi_id', $id)->with(['jns_lndry'])->get();
        $grand_total        = DetailTransaksi::where('transaksi_id', $id)->sum('subtotal');

        return view('pages.transaksi.detail', compact('jenis_laundry', 'transaksi', 'paket_laundry', 'detail_transaksi', 'grand_total'));
    }

    public function detailTransaksi(Request $request)
    {
        $data_request = $request->all();

        //! Query
        $transaksi          = Transaksi::where('no_transaksi', $data_request['no_transaksi'])->first();
        $grand_total        = DetailTransaksi::where('transaksi_id', $data_request['no_transaksi'])->sum('subtotal');
        
        //! Kondisi jika customer tidak menggunakan layanan antar jemput cucian 
        if (!$data_request['rupiah']) {
            //! Tidak menggunakan layanan antar jemput cucian

            //! Update Master Transaksi
            $transaksi->update([
                'ongkir'        => null,
                'grand_total'   => $grand_total
            ]);
        } else {
            //! Menggunakan layanan antar jemput cucian

            $total_ongkir   = $request->jarak * preg_replace("/[^0-9]/", "", $request->rupiah); 

            //! Update Master Transaksi
            $transaksi->update([
                'ongkir'        => $total_ongkir,
                'grand_total'   => $grand_total + $total_ongkir
            ]);
        }

        return redirect('transaksi');
    }

    public function checkout($no_transaksi)
    {
        //! Query
        $transaksi = Transaksi::where('no_transaksi', $no_transaksi)->first(); 

        //! Update Status Transaksi
        $transaksi->update([
            'tgl_akhir' => Carbon::now(),
            'status'    => 'Sukses'
        ]); 

        return redirect()->back();
    }

    public function store(Request $request)
    {

        //! Validasi
        $rules  = [
            'id_jns_lndry'    => 'required',
            'jml'             => 'required',
        ];

        $pesan  = [
            'required'      => 'Harap isi bidang ini!'
        ];

        $this->validate($request, $rules, $pesan); 

        //! Request
        $dataRequest = $request; 

        //! Query
        $jenis_laundry      = JenisLaundry::where('id_jns_lndry', $dataRequest->id_jns_lndry)->first(); 
        $detail_transaksi   = DetailTransaksi::where('transaksi_id', $dataRequest->no_transaksi)->where('jenis_laundry_id', $dataRequest->id_jns_lndry)->first();
        $cek_jml            = DetailTransaksi::where('transaksi_id', $dataRequest->no_transaksi)->where('jenis_laundry_id', $dataRequest->id_jns_lndry)->count();

        //! Aritmatika
        $subtotal   = $dataRequest->jml * $jenis_laundry->harga;

        //! Pengecekan Jenis Paket
        if ($cek_jml != 0) {
            //! Jika data sudah ada di tabel detail transaksi, maka cukup di update jmlnya dan subtotalnya
            $jml_lama     = $detail_transaksi->jml;
            $jml_tambahan = $dataRequest->jml;
            $total_jml    = $jml_lama + $jml_tambahan;
            $subtotal     = $jenis_laundry->harga * $total_jml;

            //! Update data detail transaksi
            $detail_transaksi->update([
                'jml'       => $total_jml,
                'subtotal'  => $subtotal
            ]);
        } else {
            //! Jika data belum terdapat di table detail transaksi, maka ditambahkan 

            //! Create Detail Transaksi
            DetailTransaksi::create([
                'transaksi_id'      => $dataRequest->no_transaksi,
                'jenis_laundry_id'  => $dataRequest->id_jns_lndry,
                'jml'               => $dataRequest->jml,
                'harga'             => $jenis_laundry->harga,
                'subtotal'          => $subtotal
            ]);
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $detail_transaksi = DetailTransaksi::where('id_dtl_transaksi', $id)->first();
        $detail_transaksi->delete();

        return redirect()->back();
    }
}
