<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengumuman extends Model
{
    use HasFactory;
    public $table = "pengumuman";
    protected $fillable = ['judul', 'isi'];

    public function index()
    {
        $data = DB::table('pengumuman')->get();
        return $data;
    }
}
