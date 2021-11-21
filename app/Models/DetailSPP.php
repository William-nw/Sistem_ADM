<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSPP extends Model
{
    protected $table = "detail_spp";
    protected $primaryKey = "id_detail_spp";
    protected $fillable = [
        'kode_spp',
        'NIS_siswa',
        'bulan',
        'tertungak',
        'denda_pembayaran',
        'total_spp',
        'tanggal_pembayaran',
        'status_detail_spp',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}
