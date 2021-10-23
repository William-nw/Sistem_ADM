<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBaju extends Model
{
    //
    protected $table = "master_baju";
    protected $primaryKey = "id_baju";
    protected $fillable = [
        'nama_baju',
        'ukuran_baju',
        'kelas',
        'harga_baju',
        'created_at',
        'updated_at'
    ];

    public function masterKelas()
    {
        return $this->hasMany('App\Models\MasterKelas', 'id', 'kelas');
    }
}
