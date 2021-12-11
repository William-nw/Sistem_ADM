<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSavings extends Model
{
    protected $table = "tabungan_siswa";
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = [
        'NIS_siswa',
        'external_id',
        'total_tabungan',
        'created_at',
        'updated_at'
    ];

    /** your docs block **/
    public function masterAccountBank()
    {
        return $this->hasOne('App\Models\MasterAkunBank', 'external_id', 'external_id');
    }
}
