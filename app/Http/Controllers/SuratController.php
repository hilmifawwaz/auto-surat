<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function index()
    {
        $surat = new Surat;
        $data = $surat->index();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('statuss', function ($data) {
                return view('admin.properties.label')->with('data', $data);
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.properties.button')->with('data', $data);
            })
            ->make(true);
    }

    public function store(Request $request)
    {

        $request->validate([
            'template' => 'required|mimes:docx|max:2048'
        ]);

        $file = $request->file('template');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('template'), $fileName);

        $data = [
            'nama_surat' => $request->nama_surat,
            'keterangan' => $request->keterangan,
            'template' => $fileName,
            'status' => 'aktif',
        ];

        Surat::create($data);

        $msg['status'] = 'success';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = Surat::where('id_surat', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_surat' => $request->nama_surat,
            'keterangan' => $request->keterangan,
            'template' => 'NULL',
            'status' => 'aktif',
        ];

        Surat::where('id_surat', $id)->update($data);

        $msg['status'] = 'success';
        return response()->json($msg);
    }

    public function destroy($id)
    {
        Surat::where('id_surat', $id)->delete();
        $msg['status'] = 'success';
        return response()->json($msg);
    }
}
