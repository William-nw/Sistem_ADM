<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClothesMoney extends Model
{
    protected $table = "uang_baju";
    protected $primaryKey = "id_uang_baju";
    protected $fillable = [
        'NIS_siswa',
        'tingkat',
        'kelas',
        'tahun_ajaran',
        'data_baju',
        'total_harga_baju',
        'status_baju',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}
