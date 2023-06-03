<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = new Pengumuman;
        $data_pengumuman = $pengumuman->index();
        $surat = new Surat;
        $data_surat = $surat->index();

        return view('index', [
            'title' => 'Beranda'
        ])
            ->with('datap', $data_pengumuman)
            ->with('datas', $data_surat);
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
        //
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

    public function auth(Request $request)
    {
        $nama = $request->nama;
        $nik = $request->nik;
        $id_surat = $request->id_surat;

        $ada_nama = Warga::where('nama_lengkap', $nama)->first();
        $ada_nik = Warga::where('nik', $nik)->first();

        if ($ada_nama && $ada_nik) {
            session()->put('nama', $nama);
            session()->put('nik', $nik);
            session()->put('id_surat', $id_surat);

            // $data = session()->all();
            // dd($data);
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
}
