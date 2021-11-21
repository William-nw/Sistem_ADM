<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSPP extends Model
{
    protected $table = "data_spp";
    protected $primaryKey = "id_spp";
    protected $fillable = [
            'kode_spp',
            'NIS_siswa',
            'tingkat',
            'kelas',
            'tahun_ajaran',
            'total_spp',
            'status_spp',
            'created_at',
            'updated_at',
        ];

    public $timestamps = false;
}
