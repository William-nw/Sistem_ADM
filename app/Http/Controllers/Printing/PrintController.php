<?php

namespace App\Http\Controllers\Printing;

use App\Http\Controllers\Controller;
use App\Models\{AdministrationConstruction, BooksMoney, ClothesMoney, ConsumptionMoney, PaymentDetailSPP};
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

    /** Print consumption **/
    public function printCosumption()
    {
        $data['adm_consumption'] = ConsumptionMoney::with('siswaData', 'paymentConsumption')->get();
        return view('admin\print.uang-konsumsi', $data);
    }

    /** Print adm clothes **/
    public function printAdmClothes()
    {
        $data['adm_clothes'] = ClothesMoney::with('siswaData', 'paymentClothes')->get();
        return view('admin\print.uang-baju', $data);
    }

    /** Print adm clothes **/
    public function printAdmBooks()
    {
        $data['adm_books'] = BooksMoney::with('siswaData', 'paymentBooks')->get();
        return view('admin\print.uang-buku', $data);
    }
}
