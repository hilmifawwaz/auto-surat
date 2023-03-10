<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = new Warga;
        $data = $warga->index();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('ttl', function ($data) {
                return $data->tempat_lahir . ', ' . date('d-m-Y', strtotime($data->tgl_lahir));
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.properties.btn-warga')->with('data', $data);
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
        $data = [
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama,
            'tempat_lahir' => $request->tempat,
            'tgl_lahir' => $request->tanggal,
            'jk' => $request->jk,
            'goldar' => $request->goldar,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'sp' => $request->kawin,
            'pekerjaan' => $request->pekerjaan,
            'kwn' => $request->kwn
        ];
        Warga::create($data);
        $msg['status'] = 'success';
        return response()->json($msg);
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
        $data = Warga::where('id_warga', $id)->first();
        return response()->json($data);
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
        $data = [
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama,
            'tempat_lahir' => $request->tempat,
            'tgl_lahir' => $request->tanggal,
            'jk' => $request->jk,
            'goldar' => $request->goldar,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'sp' => $request->kawin,
            'pekerjaan' => $request->pekerjaan,
            'kwn' => $request->kwn
        ];
        Warga::where('id_warga', $id)->update($data);
        $msg['status'] = 'success';
        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Warga::where('id_warga', $id)->delete();
        $msg['status'] = 'success';
        return response()->json($msg);
    }
}
