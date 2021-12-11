<?php

namespace App\Http\Services;

use App\Models\MasterAkunBank;
use Illuminate\Support\Facades\DB;

class PaymentGatewayService
{
    /** Create Virtual Account
     * @param object $request
     * return array $res_va
     */
    public function createVirtualAccount(object $request)
    {
        //add new key
        if( isset($request->nama_siswa) ){
            $request['nama_pemilik_rekening'] = $request->nama_siswa;
        }

        DB::beginTransaction();

        // secret key xendit on AppServiceProvider
        $timestamp = date_timestamp_get(date_create());

        $params = [
            "external_id" => "va-" . $request->nis_siswa . $timestamp,
            "bank_code" => 'BCA',
            "name" => ucwords($request->nama_pemilik_rekening)
        ];
        /**
         * docs: https://developers.xendit.co/api-reference/?php#create-virtual-account
         */
        $res_VA = \Xendit\VirtualAccounts::create($params);

        // function on model
        MasterAkunBank::insertVirtualAccount($request, $res_VA);

        DB::commit();

        return $res_VA;
    }
}
