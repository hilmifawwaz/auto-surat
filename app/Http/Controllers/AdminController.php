<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function warga()
    {
        $warga = new Warga;
        $hub_keluarga = $warga->hub_keluarga();
        $kawin = $warga->kawin();

        return view('admin.warga')
            ->with('data1', $hub_keluarga)
            ->with('data2', $kawin);
    }

    public function surat()
    {
        $surat = new Surat();
        $data = $surat->index();
        return view('admin.surat')->with('data', $data);
    }

    public function pengumuman()
    {
        return view('admin.pengumuman');
    }

    public function wilayah()
    {
        return view('admin.wilayah');
    }
}
