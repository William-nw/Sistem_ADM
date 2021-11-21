<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumptionMoney extends Model
{
    protected $table = "uang_konsumsi";
    protected $primaryKey = "id_uang_konsumsi";
    protected $fillable = [
        'kode_uang_konsumsi',
        'NIS_siswa',
        'tingkat',
        'kelas',
        'total_biaya',
        'status_konsumsi',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
}
