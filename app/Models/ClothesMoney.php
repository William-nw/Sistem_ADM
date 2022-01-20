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

    /** payment Clothes */
    public function paymentClothes()
    {
        return $this->hasMany('App\Models\PaymentClothes', 'id_uang_baju', 'id_uang_baju');
    }
}
