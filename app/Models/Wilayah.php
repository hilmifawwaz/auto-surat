<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wilayah extends Model
{
    use HasFactory;
    public $table = "wilayah";
    protected $fillable = [
        'kode',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'nama_wilayah',
        'pencarian_wilayah'
    ];

    public function index()
    {
        $data = DB::table('wilayah')->where('provinsi', 'Daerah Istimewa Yogyakarta')->get();
        return $data;
    }
}
