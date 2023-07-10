<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Surat extends Model
{
    use HasFactory;
    public $table = "surat";
    protected $fillable = ['nama_surat', 'keterangan', 'template', 'status'];

    public function index()
    {
        $data = DB::table('surat')->where('status', 'aktif')->get();
        return $data;
    }
}
