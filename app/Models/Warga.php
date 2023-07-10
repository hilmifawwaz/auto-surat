<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Warga extends Model
{
    use HasFactory;
    public $table = "warga";
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'no_kk',
        'dusun',
        'rt',
        'rw',
        'pendidikan',
        'pendidikan_ditempuh',
        'pekerjaan',
        'tgl_lahir',
        'tempat_lahir',
        'kawin',
        'hub_keluarga',
        'nama_ayah',
        'nama_ibu',
        'status'
    ];

    public function index()
    {
        $data = DB::table('warga')->get();
        return $data;
    }

    public function hub_keluarga()
    {
        $data = DB::table('warga')->select('hub_keluarga')->groupBy('hub_keluarga')->get();
        return $data;
    }

    public function kawin()
    {
        $data = DB::table('warga')->select('kawin')->groupBy('kawin')->get();
        return $data;
    }
}
