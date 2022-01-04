<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentBooks extends Model
{
    protected $table = "pembayaran_buku";
    protected $primaryKey = "id_pembayaran_buku";
    protected $fillable = [
        'kode_pembayaran_buku',
        'id_uang_buku',
        'NIS_siswa',
        'tanggal_pembayaran',
        'total_pembayaran_buku',
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
