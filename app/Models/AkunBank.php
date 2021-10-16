<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AkunBank extends Model
{
    protected $table = "bank_account";
    protected $primaryKey = "id_bank_account";
    protected $fillable = [
        'bank_id',
        'external_id',
        'owner_id',
        'merchant_code',
        'bank_code',
        'account_number',
        'name',
        'type_account',
        'status_bank',
        'expiration_date',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    /** getBankAccount
     * @return object
     */
    public static function getActiveBankAccount(): object
    {
        return AkunBank::where('status_bank', 'ACTIVE')->get();
    }

    /** insert virtual account
     * @param object $request
     * @param array $response
     * return void
     */
    public static function insertVirtualAccount(object $request, array $response): void
    {

        AkunBank::create([
            'bank_id' => $response['id'],
            'external_id' => $response['external_id'],
            'owner_id' => $response['owner_id'],
            'merchant_code' => $response['merchant_code'],
            'bank_code' => $response['bank_code'],
            'account_number' => $response['account_number'],
            'name' => $response['name'],
            'type_account'=> $request->tipe_bank,
            'status_bank' => $response['status'],
            'expiration_date' => date('Y-m-d',strtotime($response['expiration_date']) ),
            'created_at' => Carbon::now(),
        ]);
    }

    /** updateVirtualAccount
     * @param array $response
     * return :void
     */
    public static function updateVirtualAccount(array $response): void
    {
        AkunBank::where('bank_id', $response['id'])
                  ->update([
                      'status_bank' => $response['status'],
                      'expiration_date' => date('Y-m-d',strtotime($response['expiration_date']) ),
                      'updated_at' => Carbon::now(),
                  ]);
    }

}
