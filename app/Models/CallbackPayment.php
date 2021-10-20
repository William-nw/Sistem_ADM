<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackPayment extends Model
{
    protected $table = "callback_pembayaran";
    protected $primaryKey = "id_callback_pembayaran";
    protected $fillable = [
        'owner_id',
        'external_id',
        'callback_virtual_account_id',
        'payment_id',
        'bank_code',
        'account_number',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    /** relationship master bank account */
    public function masterBankAccount()
    {
        return $this->belongsTo('App\Models\MasterAkunBank', 'external_id', 'external_id');
    }
}
