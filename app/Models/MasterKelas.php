<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKelas extends Model
{
    protected $table = "master_kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kelas',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
 
    
     /** relationship master buku */
     public function masterBuku()
     {
        return $this->belongsTo('App\Models\MasterBuku', 'kelas', 'id');
     }

     public function masterBaju()
     {
        return $this->belongsTo('App\Models\MasterBaju', 'kelas', 'id');
     }

}
