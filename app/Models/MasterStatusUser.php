<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MasterStatusUser extends Model
{
    protected $table = "master_status_user";
    protected $primaryKey = "id_status_user";
    protected $fillable = [
        'status'
    ];

    public $timestamps = false;

    //relationship to userModel
    public function masterUserStatus()
    {
       return $this->belongsTo('App\Models\UserModel', 'status', 'status');
    }

}
