<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CallbackPayment;
use App\Models\MasterAkunBank;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CallBackController extends Controller
{
    /** callBack Payment third party
     * @return void
     */
    public function callBackPayment(Request $request): void
    {
        DB::beginTransaction();
        try {
            // table callback_pembayaran
            CallbackPayment::updateOrCreate(
                [
                    'tanggal_pembayaran' => date('Y-m-d H:i:s', strtotime($request['transaction_timestamp'])),
                    'external_id' => $request['external_id']
                ],
                [
                    'owner_id' => $request['owner_id'],
                    'external_id' => $request['external_id'],
                    'callback_virtual_account_id' => $request['external_id'],
                    'payment_id' => $request['payment_id'],
                    'bank_code' => $request['bank_code'],
                    'account_number' => $request['account_number'],
                    'jumlah_pembayaran' => $request['amount'],
                    'tanggal_pembayaran' => date('Y-m-d H:i:s', strtotime($request['transaction_timestamp'])),
                    'updated_at' => Carbon::now(),
                ]
            );
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            log::debug('error API CallBackController function callBackPayment');
            log::debug($e);
        }

    }

    /** callBack Fix Virtual Account third party
     * @return void
     */
    public function callBackFVA(Request $request): void
    {
        try {
            // if exist external_id bank_account update if not create
            MasterAkunBank::updateOrCreate(
                ['external_id' => $request['external_id']],
                [
                    'bank_id' => $request['id'],
                    'external_id' => $request['external_id'],
                    'owner_id' => $request['owner_id'],
                    'merchant_code' => $request['merchant_code'],
                    'bank_code' => $request['bank_code'],
                    'account_number' => $request['account_number'],
                    'name' => $request['name'],
                    'type_account' => "Virtual Account",
                    'status_bank' => $request['status'],
                    'expiration_date' => date('Y-m-d', strtotime($request['expiration_date'])),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        } catch (\Throwable $e) {
            log::debug('error API CallBackController function callBackFVA');
            log::debug($e);
        }

    }
}
