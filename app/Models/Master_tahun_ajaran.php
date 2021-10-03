<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_tahun_ajaran extends Model
{
    protected $table = "master_tahun_ajaran";
    protected $fillable = ['id', 'nama_tahun_ajaran'];
    protected $primaryKey = "id";

    public $timestamps = false;
}
