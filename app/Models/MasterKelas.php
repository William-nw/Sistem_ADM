<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKelas extends Model
{
    protected $table = "master_kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kelas',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;


     /** relationship master buku */
     public function masterBuku()
     {
        return $this->belongsTo('App\Models\MasterBuku', 'kelas', 'id');
     }

     public function masterBaju()
     {
        return $this->belongsTo('App\Models\MasterBaju', 'kelas', 'id');
     }

     /** siswa **/
     public function siswa()
     {
        return $this->belongsTo('App\Models\Siswa', 'kelas');
     }

    /** Data Spp */
    public function dataSpp()
    {
        return $this->belongsTo('App\Models\DataSPP', 'kelas', 'id');
    }

    /** Data administration construction */
    public function dataAdministrationConstruction()
    {
        return $this->belongsTo('App\Models\AdministrationConstruction', 'kelas', 'id');
    }

    /** Data Books Money */
    public function dataBooksMoney()
    {
        return $this->belongsTo('App\Models\BooksMoney', 'kelas', 'id');
    }

    /** Data Clothes Money */
    public function dataClothesMoney()
    {
        return $this->belongsTo('App\Models\ClothesMoney', 'kelas', 'id');
    }

    /** Data Consumption Money **/
    public function dataConsumptionMoney()
    {
        return $this->belongsTo('App\Models\ConsumptionMoney', 'kelas', 'id');
    }
}
