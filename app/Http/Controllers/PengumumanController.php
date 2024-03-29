<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = new Pengumuman;
        $data = $pengumuman->index();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('admin.properties.btn-pengumuman')->with('data', $data);
            })->make(true);
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
        $validatedData = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul Pengumuman Wajib Diisi',
            'isi.required' => 'Isi Pengumuman Wajib Diisi'
        ]);

        if ($validatedData->fails()) {
            return response()->json(['error' => $validatedData->errors()]);
        } else {
            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi
            ];
            Pengumuman::create($data);
            return response()->json(['success' => 'Data berhasil disimpan']);
        }
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
        $data = Pengumuman::where('id_pengumuman', $id)->first();
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
        $validatedData = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], [
            'judul.required' => 'Judul Pengumuman Wajib Diisi',
            'isi.required' => 'Isi Pengumuman Wajib Diisi'
        ]);

        if ($validatedData->fails()) {
            return response()->json(['error' => $validatedData->errors()]);
        } else {
            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi
            ];
            Pengumuman::where('id_pengumuman', $id)->update($data);
            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengumuman::where('id_pengumuman', $id)->delete();
        $msg['status'] = 'success';
        return response()->json($msg);
    }
}
