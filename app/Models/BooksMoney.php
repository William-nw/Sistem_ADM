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
}
