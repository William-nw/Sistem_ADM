<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function _privelege(){
        $privilege = DB::table('users')->where('id', Auth::user()->id)->select('id','status','namname')
        ->first();
        DB::disconnect('users');
        return $privilege;

    }

    protected function _getSiswaLoginByOrtu()
    {
        $dataLogin = $this->_privelege();
        $getSiswa = DB::table('users')->where('id', $dataLogin->id)->get();

        foreach ($getSiswa as $indexSiswa => $valueSiswa) {
            $siswa = Siswa::_onlySiswa($valueSiswa->nis);
            $valueSiswa->dataDetailSiswa = $siswa;

            // $spp= DB::table('spp')->where('nis', '=', $valueSiswa->nis)->get();
            // $valueSiswa->SPP = $spp;

            // $pembangunan = DB::table('pembangunan')->where('nis', '=', $valueSiswa->nis)->get();
            // $valueSiswa->Pembangunan = $pembangunan;
           
        }
        DB::disconnect('Siswa');


        return[
            "dataLogin" => $dataLogin,
            "getSiswa" => $getSiswa
        ];
    }
}