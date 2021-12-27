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

    /** Master ortu*/
    public function masterOrtu()
    {
        return $this->hasOne('App\Models\MasterOrtu', 'id');
    }

    /** Data spp **/
    public function dataSPP()
    {
        return $this->belongsTo('App\Models\DataSPP', 'NIS_siswa', 'NIS_siswa');
    }

    /** Data Construction **/
    public function dataAdministrationConstruction()
    {
        return $this->belongsTo('App\Models\AdministrationConstruction', 'NIS_siswa', 'NIS_siswa');
    }

    /** Data Books Money **/
    public function dataBooksMoney()
    {
        return $this->belongsTo('App\Models\BooksMoney', 'NIS_siswa', 'NIS_siswa');
    }

    /** Data Clothes Money **/
    public function dataClothesMoney()
    {
        return $this->belongsTo('App\Models\ClothesMoney', 'NIS_siswa', 'NIS_siswa');
    }

    /** Data Consumption Money **/
    public function dataConsumptionMoney()
    {
        return $this->belongsTo('App\Models\ConsumptionMoney', 'NIS_siswa', 'NIS_siswa');
    }
}
