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

    /** Siswa **/
    public function siswaData()
    {
        return $this->hasOne('App\Models\Siswa', 'NIS_siswa', 'NIS_siswa');
    }

    /** Kelas**/
    public function masterKelas()
    {
        return $this->hasOne('App\Models\MasterKelas', 'id', 'kelas');
    }

    /** tahun ajaran **/
    public function tahunAjaran()
    {
        return $this->hasOne('App\Models\MasterTahunAjaran', 'id', 'tahun_ajaran');
    }

}
