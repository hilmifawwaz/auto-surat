<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $validatedData = Validator::make($request->all(), [
            'nama_surat' => 'required',
            'keterangan' => 'required',
            'template' => 'required|mimes:docx|max:2048'
        ], [
            'nama_surat.required' => 'Nama Surat Wajib Diisi',
            'keterangan.required' => 'Keterangan Wajib Diisi',
            'template.required' => 'Template Surat Wajib Diisi',
            'template.mimes' => 'Template Surat Harus Berformat .docx',
            'template.max' => 'Ukuran Template Surat Maksimal 2MB'
        ]);

        if ($validatedData->fails()) {
            return response()->json(['error' => $validatedData->errors()]);
        } else {
            $file = $request->file('template');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('template'), $fileName);

            $data = [
                'nama_surat' => $request->nama_surat,
                'keterangan' => $request->keterangan,
                'template' => $fileName,
                'status' => 'non-aktif',
            ];

            Surat::create($data);
            return response()->json(['success' => 'Data berhasil disimpan']);
        }
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

    public function aktif($id)
    {
        $data = [
            'status' => 'aktif'
        ];
        Surat::where('id_surat', $id)->update($data);

        $msg['status'] = 'success';
        return response()->json($msg);
    }

    public function nonaktif($id)
    {
        $data = [
            'status' => 'non-aktif'
        ];
        Surat::where('id_surat', $id)->update($data);

        $msg['status'] = 'success';
        return response()->json($msg);
    }
}
