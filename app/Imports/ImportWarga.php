<?php

namespace App\Imports;

use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportWarga implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Warga([
            'nik' => $row['nik'] ?? '0',
            'nama_lengkap' => $row['nama'] ?? 'no_name',
            'no_kk' => $row['no_kk'] ?? '0',
            'dusun' => $row['dusun'] ?? '-',
            'rw' => $row['rt'] ?? '-',
            'rt' => $row['rw'] ?? '-',
            'pendidikan' => $row['pendidikan'] ?? '-',
            'pendidikan_ditempuh' => $row['pendidikan_ditempuh'] ?? '-',
            'pekerjaan' => $row['pekerjaan'] ?? '-',
            'tgl_lahir' => date('Y-m-d', strtotime($row['tgl_lahir'])) ?? '-',
            'tempat_lahir' => $row['tempat_lahir'] ?? '-',
            'kawin' => $row['kawin'] ?? '-',
            'hub_keluarga' => $row['hub_keluarga'] ?? '-',
            'nama_ayah' => $row['nama_ayah'] ?? '-',
            'nama_ibu' => $row['nama_ibu'] ?? '-',
            'status' => $row['status'] ?? '-'
        ]);
    }
}
