<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BooksMoney extends Model
{
    protected $table = "uang_buku";
    protected $primaryKey = "id_uang_buku";
    protected $fillable = [
        'NIS_siswa',
        'tingkat',
        'kelas',
        'tahun_ajaran',
        'data_buku',
        'total_harga_buku',
        'status_buku',
        'created_at',
        'updated_at'
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
