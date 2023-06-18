<?php

namespace App\Http\Controllers;

use App\Imports\ImportWarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
            ->addColumn('tgl_lhr', function ($data) {
                return date('d-m-Y', strtotime($data->tgl_lahir));
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.properties.btn-warga')->with('data', $data);
            })
            ->make(true);
    }

    public function import()
    {
        Excel::import(new ImportWarga(), request()->file('import'));

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
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
            'no_kk' => $request->no_kk,
            'dusun' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'pendidikan' => $request->pend_terakhir,
            'pendidikan_ditempuh' => $request->pendidikan_skrg,
            'pekerjaan' => $request->pekerjaan,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'kawin' => $request->kawin,
            'hub_keluarga' => $request->hub_keluarga,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'status' => $request->status,
        ];
        // dd($data);
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
            'no_kk' => $request->no_kk,
            'dusun' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'pendidikan' => $request->pend_terakhir,
            'pendidikan_ditempuh' => $request->pendidikan_skrg,
            'pekerjaan' => $request->pekerjaan,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'kawin' => $request->kawin,
            'hub_keluarga' => $request->hub_keluarga,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'status' => $request->status,
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
