<?php

namespace App\Http\Controllers\Printing;

use App\Http\Controllers\Controller;
use App\Models\{AdministrationConstruction,PaymentDetailSPP};
use Illuminate\Http\Request;

class PrintController extends Controller
{
    /** Print SPP **/
    public function printSPP()
    {
        $data['payment_spp'] = PaymentDetailSPP::with('siswaData.masterKelas','siswaData.tahunAjaran', 'detailSPP')->get();
        return view('admin\print.spp', $data);
    }

    /** Print construction **/
    public function printConstruction()
    {
        $data['adm_construction'] = AdministrationConstruction::with('siswaData', 'paymentConstruction')->get();
        return view('admin\print.uang-pembagunan', $data);
    }
}
