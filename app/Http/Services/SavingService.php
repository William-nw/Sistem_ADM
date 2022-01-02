<?php

namespace App\Http\Services;

use App\Http\Traits\CallBackPaymentTraits;
use App\Models\StudentSavings;
use Carbon\Carbon;

class SavingService
{

    use CallBackPaymentTraits;

    /** Update Balance Saving Student
     * @param object $request
     * @return void
     */
    public function updateBalanceSavingStudent(object $request)
    {
        $student_saving = StudentSavings::where('external_id', $request['external_id'])->first();
        // if have student saving
        if(!is_null($student_saving))
        {
            $total_amount = ($student_saving->total_tabungan + $request['amount']);
            StudentSavings::where('external_id', $request['external_id'])
                ->update([
                    'total_tabungan' => $total_amount,
                    'updated_at' => Carbon::now(),
                ]);
        }
    }


}
