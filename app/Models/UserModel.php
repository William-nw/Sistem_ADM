<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserModel extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    /** Get All User Parent **/
    public static function datasParent()
    {
        return UserModel::select('id', 'name', 'email', 'no_hp', 'siswa_ortu','status')
            ->where('status', 'orang_tua')
            ->get();
    }

    /** Get All User Parent **/
    public static function userParent()
    {
        return UserModel::select('id', 'name', 'email', 'no_hp', 'siswa_ortu','status')
            ->where([ [ 'id', Auth::User()->id],['status', 'orang_tua']])
            ->get();
    }
}
