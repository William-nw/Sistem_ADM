<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentConsumption extends Model
{
    protected $table = "pembayaran_konsumsi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_uang_konsumsi',
        'NIS_siswa',
        'kode_pembayaran',
        'tanggal_bayar',
        'total_pembayaran',
        'keterangan',
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
