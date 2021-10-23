<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'NIS_siswa ',
        'nama_siswa',
        'tingkat',
        'kelas',
        'tahun_ajaran',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
