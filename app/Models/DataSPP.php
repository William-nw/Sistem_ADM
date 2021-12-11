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

    /** Siswa**/
    public function siswaData()
    {
        return $this->hasMany('App\Models\Siswa', 'NIS_siswa', 'NIS_siswa');
    }

    /** Detailspp **/
    public function detailSppStudent()
    {
        return $this->hasMany('App\Models\DetailSPP', 'kode_spp', 'kode_spp');
    }

    /** Kelas**/
    public function masterKelas()
    {
        return $this->hasOne('App\Models\MasterKelas', 'id');
    }

    /** tahun ajaran **/
    public function tahunAjaran()
    {
        return $this->hasOne('App\Models\MasterTahunAjaran', 'id');
    }
}
