<?php

namespace App\Http\Traits;

use App\Models\CallbackPayment;

trait CallBackPaymentTraits
{
    /** check existing payment
     * @param object $request
     */
    public function checkExistingCallBackPayment(object $request)
    {
        return CallbackPayment::where('payment_id', $request['payment_id'])->count();
    }

}
