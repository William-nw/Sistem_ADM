<?php

namespace App\Http\Controllers;

use App\Models\MasterAkunBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    public function updateVa()
    {
        DB::beginTransaction();
        try {
            $banks = MasterAkunBank::getActiveBankAccount();

            foreach ($banks as $bank)
            {
                $get_virtual_account = \Xendit\VirtualAccounts::retrieve($bank->bank_id);
                MasterAkunBank::updateVirtualAccount($get_virtual_account);
            };

            DB::commit();
            return redirect()->route('akun-bank.index')->with(['success' => 'Bank Account Updated']);
        }catch (\Exception $e)
        {
            DB::rollback();
            log::debug($e);
            return redirect()->route('akun-bank.index')->with(['error' => $e->getMessage()]);
        }
    }
}
