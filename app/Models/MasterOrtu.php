<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterOrtu extends Model
{
    //
    protected $table = "ortu";
    protected $primaryKey = "id";

    public $timestamps = false;

    public function MasterSiswa()
     {
        return $this->belongsTo('App\Models\Siswa', 'kelas');
     }
}
