<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\PaketLaundry;
use Illuminate\Http\Request;

class JenisLaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket_laundry  = PaketLaundry::all();

        return view('pages.jenis-laundry.index', compact('paket_laundry'));
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
        //! Validasi
        $rules  = [
            'nama_paket'    => 'required',
            'harga'         => 'required'
        ];

        $pesan  = [
            'required'      => 'Harap isi bidang ini!'
        ];

        $this->validate($request, $rules, $pesan);

        //! Insert Data
        JenisLaundry::create([
            'nama_paket'    => ''
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $paket_laundry = PaketLaundry::where('id_pkt_lndry', $id)->first();
        $jenis_laundry = JenisLaundry::where('paket_laundry_id', '==', $id)->get();

        return view('pages.jenis-laundry.show', compact('jenis_laundry'));
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
}
