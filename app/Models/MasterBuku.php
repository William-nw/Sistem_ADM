<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBuku extends Model
{
    protected $table = "master_buku";
    protected $primaryKey = "id_buku";
    protected $fillable = [
        'nama_buku',
        'kelas',
        'tahun_ajaran',
        'harga_buku',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

    
    /** relation master kelas */
    public function masterKelas()
    {
        return $this->hasMany('App\Models\MasterKelas', 'id', 'kelas');
    }
    public function masterTahunAjaran()
    {
        return $this->hasMany('App\Models\MasterTahunAjaran', 'id', 'tahun_ajaran');
    }
}
