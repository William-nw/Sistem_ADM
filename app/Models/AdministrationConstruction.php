<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministrationConstruction extends Model
{
    protected $table = "uang_pembangunan";
    protected $primaryKey = "id_uang_pembangunan";
    protected $fillable = [
        'NIS_siswa',
        'kode_pembangunan',
        'kelas',
        'tahun_ajaran',
        'keterangan_angsuran',
        'total_biaya',
        'status_pembangunan',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}
