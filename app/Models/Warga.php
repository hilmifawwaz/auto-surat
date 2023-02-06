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
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'goldar',
        'alamat',
        'agama',
        'sp',
        'pekerjaan',
        'kwn'
    ];

    public function index()
    {
        $data = DB::table('warga')->get();
        return $data;
    }
}
