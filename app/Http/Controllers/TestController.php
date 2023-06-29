<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
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
        $data_surat = Surat::where('id_surat', $request->id_surat)->first();

        $nama = $data_warga->nama_lengkap;
        $nik = $data_warga->nik;
        $no_kk = $data_warga->no_kk;
        $dusun = $data_warga->dusun;
        $rt = $data_warga->rt;
        $rw = $data_warga->rw;
        $pendidikan = $data_warga->pendidikan;
        $pend_ditempuh = $data_warga->pendidikan_ditempuh;
        $pekerjaan = $data_warga->pekerjaan;
        $tempat_lahir = $data_warga->tempat_lahir;
        $tgl_lahir = $data_warga->tgl_lahir;
        $kawin = $data_warga->kawin;
        $hub_keluarga = $data_warga->hub_keluarga;
        $nama_ayah = $data_warga->nama_ayah;
        $nama_ibu = $data_warga->nama_ibu;
        $status = $data_warga->status;
        $no_telp = $request->telepon;
        $alamat = $request->alamat;
        $alasan = $request->alasan; //$a
        $jumlah_anggota = $request->jumlah; //$b
        $c = $request->alasan_pindah;
        $d = $request->jenis;
        $e = $request->status_tidak_pindah;
        $f = $request->status_pindah;
        $alamat_2 = $request->alamat_2;
        $rt_2 = $request->rt_2;
        $rw_2 = $request->rw_2;
        $dusun_2 = $request->dusun_2;
        $kelurahan_2 = $request->kelurahan_2;
        $kecamatan_2 = $request->kecamatan_2;
        $kota_2 = $request->kota_2;
        $provinsi_2 = $request->provinsi;
        $no_telp_2 = $request->telepon_2;
        $kepala_keluarga = $request->kepala_keluarga;
        $kode_pos = $request->kode_pos;
        $nik_anggota1 = $request->keluarga1;
        $nik_anggota2 = $request->keluarga2;
        $nik_anggota3 = $request->keluarga3;
        $nik_anggota4 = $request->keluarga4;
        $nik_anggota5 = $request->keluarga5;
        $nik_anggota6 = $request->keluarga6;
        $nik_anggota7 = $request->keluarga7;
        $nik_anggota8 = $request->keluarga8;
        $nik_anggota9 = $request->keluarga9;
        $nik_anggota10 = $request->keluarga10;
        $tanggal = date('d-m-Y');

        if ($nik_anggota1 != NULL) {
            $nama_anggota1 = Warga::where('nik', $nik_anggota1)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota2 != NULL) {
            $nama_anggota2 = Warga::where('nik', $nik_anggota2)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota3 != NULL) {
            $nama_anggota3 = Warga::where('nik', $nik_anggota3)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota4 != NULL) {
            $nama_anggota4 = Warga::where('nik', $nik_anggota4)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota5 != NULL) {
            $nama_anggota5 = Warga::where('nik', $nik_anggota5)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota6 != NULL) {
            $nama_anggota6 = Warga::where('nik', $nik_anggota6)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota7 != NULL) {
            $nama_anggota7 = Warga::where('nik', $nik_anggota7)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota8 != NULL) {
            $nama_anggota8 = Warga::where('nik', $nik_anggota8)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota9 != NULL) {
            $nama_anggota9 = Warga::where('nik', $nik_anggota9)->pluck('nama_lengkap')->first();
        }
        if ($nik_anggota10 != NULL) {
            $nama_anggota10 = Warga::where('nik', $nik_anggota10)->pluck('nama_lengkap')->first();
        }

        $new_tgl_lahir = date("d-m-Y", strtotime($tgl_lahir));

        $phpWord = new TemplateProcessor('template/' . $data_surat->template);
        $phpWord->setValues([
            'nama' => $nama,
            'nik' => $nik,
            'no_kk' => $no_kk,
            'dusun' => $dusun,
            'rt' => $rt,
            'rw' => $rw,
            'pendidikan' => $pendidikan,
            'pendidikan_ditempuh' => $pend_ditempuh,
            'pekerjaan' => $pekerjaan,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $new_tgl_lahir,
            'kawin' => $kawin,
            'hub_keluarga' => $hub_keluarga,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'status' => $status,
            'a' => $alasan,
            'b' => $jumlah_anggota,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'f' => $f,
            'alamat' => $alamat,
            'kepala_keluarga' => $kepala_keluarga,
            'alamat_2' => $alamat_2,
            'rt_2' => $rt_2,
            'rw_2' => $rw_2,
            'dusun_2' => $dusun_2,
            'kelurahan_2' => $kelurahan_2,
            'no_telp' => $no_telp,
            'kode_pos' => $kode_pos,
            'kecamatan_2' => $kecamatan_2,
            'kota_2' => $kota_2,
            'provinsi_2' => $provinsi_2,
            'nik_anggota1' => $nik_anggota1 ?? ' ',
            'nik_anggota2' => $nik_anggota2 ?? ' ',
            'nik_anggota3' => $nik_anggota3 ?? ' ',
            'nik_anggota4' => $nik_anggota4 ?? ' ',
            'nik_anggota5' => $nik_anggota5 ?? ' ',
            'nik_anggota6' => $nik_anggota6 ?? ' ',
            'nik_anggota7' => $nik_anggota7 ?? ' ',
            'nik_anggota8' => $nik_anggota8 ?? ' ',
            'nik_anggota9' => $nik_anggota9 ?? ' ',
            'nik_anggota10' => $nik_anggota10 ?? ' ',
            'nama_anggota1' => $nama_anggota1 ?? ' ',
            'nama_anggota2' => $nama_anggota2 ?? ' ',
            'nama_anggota3' => $nama_anggota3 ?? ' ',
            'nama_anggota4' => $nama_anggota4 ?? ' ',
            'nama_anggota5' => $nama_anggota5 ?? ' ',
            'nama_anggota6' => $nama_anggota6 ?? ' ',
            'nama_anggota7' => $nama_anggota7 ?? ' ',
            'nama_anggota8' => $nama_anggota8 ?? ' ',
            'nama_anggota9' => $nama_anggota9 ?? ' ',
            'nama_anggota10' => $nama_anggota10 ?? ' ',
            'tanggal' => $tanggal,
        ]);

        // INPUT AUDIT LOG
        $data = [
            'id_warga' => session('id_warga'),
            'id_surat' => session('id_surat'),
            'keperluan' => '-',
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
        ];
        AuditLog::create($data);


        $pathToSave = 'hasil-surat/' . $nik . '.docx';
        $fileName = $data_surat->nama_surat . '-' . $nik . '.docx';
        $phpWord->saveAs($pathToSave);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessing‌​ml.document');
        readfile($pathToSave);
        header("Location: /");
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
