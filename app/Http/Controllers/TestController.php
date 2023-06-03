<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Warga;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        new Warga;
        new Surat;
        $data_warga = Warga::where('nik', session('nik'))->first();
        $data_surat = Surat::where('id_surat', session('id_surat'))->first();

        $nama = $data_warga->nama_lengkap;
        $nik = $data_warga->nik;
        $tempat_lahir = $data_warga->tempat_lahir;
        $tgl_lahir = $data_warga->tgl_lahir;
        $gender = $data_warga->jk;

        if ($gender == "L") {
            $gender = "Laki-Laki";
        } else {
            $gender = 'Perempuan';
        }

        $no = 1;
        $new_tgl_lahir = date("d-m-Y", strtotime($tgl_lahir));

        $phpWord = new TemplateProcessor('template/' . $data_surat->template);
        $phpWord->setValues([
            'nama' => $nama,
            'nik' => $nik,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $new_tgl_lahir,
            'gender' => $gender
        ]);

        $pathToSave = 'hasil-surat/' . $nik . '.docx';
        $phpWord->saveAs($pathToSave);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . $pathToSave . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessing‌​ml.document');
        readfile($pathToSave);
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
