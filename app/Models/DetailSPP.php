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
        'jatuh_tempo',
        'bulan',
        'tertungak',
        'total_spp',
        'tanggal_pembayaran',
        'status_detail_spp',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    /** dataSPP **/
    public function dataSPP()
    {
        return $this->belongsTo('App\Models\DataSPP', 'kode_spp', 'kode_spp');
    }

    /** Payment Detail SPP **/
    public function paymentDetailSPP()
    {
        return $this->belongsTo('App\Models\PaymentDetailSPP', 'kode_spp', 'id_detail_spp');
    }
}
