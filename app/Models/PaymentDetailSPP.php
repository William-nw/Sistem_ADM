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
}
