<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        // Session::forget('nama', 'nik', 'id_surat', 'id_warga');
        return view('index', [
            'title' => 'Beranda'
        ])
            ->with('datap', $data_pengumuman)
            ->with('datas', $data_surat)
            ->with(Session::forget('nama'))
            ->with(Session::forget('nik'))
            ->with(Session::forget('id_surat'))
            ->with(Session::forget('id_warga'));
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

        $ada = Warga::where('nama_lengkap', $nama)->where('nik', $nik)->first();

        if ($ada != NULL) {
            session()->put('nama', $ada->nama_lengkap);
            session()->put('nik', $ada->nik);
            session()->put('id_surat', $id_surat);
            session()->put('id_warga', $ada->id_warga);

            // $data = session()->all();
            // dd($data);
            return response()->json(['exists' => true]);
        } else if ($ada == NULL) {
            return response()->json(['exists' => false]);
        }
    }
}
