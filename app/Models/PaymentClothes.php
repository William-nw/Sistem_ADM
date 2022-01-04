<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentClothes extends Model
{
    protected $table = "pembayaran_baju";
    protected $primaryKey = "id_pembayaran_baju";
    protected $fillable = [
        'kode_pembayaran_baju',
        'id_uang_baju',
        'NIS_siswa',
        'tanggal_pembayaran',
        'total_pembayaran_baju',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    /** Siswa **/
    public function siswaData()
    {
        return $this->hasOne('App\Models\Siswa', 'NIS_siswa', 'NIS_siswa');
    }
}
