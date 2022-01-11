<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetailSPP extends Model
{
    protected $table = "detail_pembayaran_spp";
    protected $primaryKey = "id_detail_pembayaran_spp";
    protected $fillable = [
        'kode_spp',
        'kode_pembayaran',
        'NIS_siswa',
        'bulan',
        'tanggal_pembayaran',
        'total_bayar',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    /** Siswa **/
    public function siswaData()
    {
        return $this->hasOne('App\Models\Siswa', 'NIS_siswa', 'NIS_siswa');
    }

    /** detail spp **/
    public function detailSPP()
    {
        return $this->hasOne('App\Models\detailSPP', 'id_detail_spp', 'kode_spp');
    }
}
