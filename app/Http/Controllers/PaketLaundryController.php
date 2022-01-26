<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\JenisLaundry;
use Illuminate\Support\Str;
use App\Models\PaketLaundry;
use Illuminate\Http\Request;

class PaketLaundryController extends Controller
{
    public function index()
    {
        $paket_laundry = PaketLaundry::all();

        return view('pages.paket-laundry.index',  compact('paket_laundry'));
    }

    public function store(Request $request)
    {
        //! Validasi
        $rules  = [
            'nama_paket'    => 'required',
        ];

        $pesan  = [
            'required'      => 'Harap isi bidang ini!'
        ];

        $this->validate($request, $rules, $pesan);

        //! Insert Data
        PaketLaundry::create([
            'nama_paket'     => $request->nama_paket,
            'slug'           => Str::slug($request->nama_paket)
        ]); 

        return redirect()->back()->with('success', 'Task Created Successfully!');
    }
    
    public function edit($id)
    {
        $paket_laundry = PaketLaundry::findOrFail($id);

        return view('pages.paket-laundry.edit', compact('paket_laundry'));
    }

    public function update(Request $request, $id)
    {
        //! Validasi
        $rules  = [
            'nama_paket'    => 'required',
        ];

        $pesan  = [
            'required'      => 'Harap isi bidang ini!'
        ];
        $this->validate($request, $rules, $pesan);

        $paket_laundry = PaketLaundry::findOrFail($id);

        //! Update Data
        $paket_laundry->update([
            'nama_paket'     => $request->nama_paket,
            'slug'           => Str::slug($request->nama_paket)
        ]); 

        return redirect('paket-laundry')->withSuccess('Task Created Successfully!');
    }

    public function destroy($id)
    {
        $paket_laundry = PaketLaundry::findOrFail($id);
        $paket_laundry->delete();

        return redirect('paket-laundry')->with('success', 'Task Created Successfully!');
    }

    //! Jenis Laundry
    // public function jenis_laundry($id)
    // {
    //     $jenis_laundry = JenisLaundry::where('paket_laundry_id', $id)->get();

    //     return view('pages.jenis-laundry.index', compact('jenis_laundry'));
    // }

    // public function jenis_laundry_store(Request $request)
    // {
    //     return $request;
    // }
}
