<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function warga()
    {
        return view('admin.warga');
    }

    public function surat()
    {
        $surat = new Surat();
        $data = $surat->index();
        return view('admin.surat')->with('data', $data);
    }
}
