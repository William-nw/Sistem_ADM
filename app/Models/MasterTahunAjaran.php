<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterTahunAjaran extends Model
{
    protected $table = "master_tahun_ajaran";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_tahun_ajaran'
    ];

    public $timestamps = false;

    public function masterBuku()
     {
        return $this->belongsTo('App\Models\MasterBuku', 'tahun_ajaran', 'id');
     }

     /** siswa **/
     public function siswa()
     {
        return $this->belongsTo('App\Models\Siswa', 'tahun_ajaran');
     }

    /** Data Spp */
    public function dataSpp()
    {
        return $this->belongsTo('App\Models\DataSPP', 'tahun_ajaran', 'id');
    }
}
