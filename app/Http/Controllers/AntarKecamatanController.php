<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class AntarKecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = new Wilayah;
        $provinsi = $wilayah->provinsi();

        return view('antar-kecamatan', [
            'title' => 'Antar Kecamatan'
        ])->with('prov', $provinsi);
    }

    public function get_kabupaten(Request $request)
    {
        $data = $request->input('provinsi');
        $kabupaten = Wilayah::select('kabupaten')->groupBy('kabupaten')->where('provinsi', $data)->get();
        return response()->json($kabupaten);
    }

    public function get_kecamatan(Request $request)
    {
        $data = $request->input('kota');
        $kecamatan = Wilayah::select('kecamatan')->groupBy('kecamatan')->where('kabupaten', $data)->get();
        return response()->json($kecamatan);
    }

    public function get_kelurahan(Request $request)
    {
        $data = $request->input('kecamatan');
        $kelurahan = Wilayah::select('kelurahan')->where('kecamatan', $data)->get();
        return response()->json($kelurahan);
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
}
