<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuditLog extends Model
{
    use HasFactory;
    public $table = "audit_log";
    protected $fillable = [
        'id_warga',
        'id_surat',
        'keperluan',
        'tanggal',
        'jam',
    ];

    public function index()
    {
        $data = DB::table('audit_log')
            ->leftJoin('warga', 'audit_log.id_warga', '=', 'warga.id_warga')
            ->leftJoin('surat', 'audit_log.id_surat', '=', 'surat.id_surat')
            ->get();
        return $data;
    }
}
