<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\{AdministrationConstruction, BooksMoney, ClothesMoney, ConsumptionMoney, PaymentDetailSPP};
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /** Report Spp **/
    public function reportSPP()
    {
        $data['payment_spp'] = PaymentDetailSPP::with('siswaData.masterKelas','siswaData.tahunAjaran', 'detailSPP')->get();
        return view('laporan-pembayaran.index', $data);
    }

    /** Report Construction **/
    public function reportConstruction()
    {
        $data['adm_construction'] = AdministrationConstruction::with('siswaData', 'paymentConstruction')->get();
        return view('laporan-pembayaran.laporan_pembangunan', $data);
    }

    /** Report Consumption **/
    public function reportConsumption()
    {
        $data['adm_cosumption'] = ConsumptionMoney::with('siswaData', 'paymentConsumption')->get();
        return view('laporan-pembayaran.laporan_konsumsi', $data);
    }

    /** Report adm clothes **/
    public function reportClothes()
    {
        $data['adm_clothes'] = ClothesMoney::with('siswaData', 'paymentClothes')->get();
        return view('laporan-pembayaran.laporan_uang_baju', $data);
    }

    /** Report adm books **/
    public function reportBooks()
    {
        $data['adm_books'] = BooksMoney::with('siswaData', 'paymentBooks')->get();
        return view('laporan-pembayaran.laporan_uang_buku', $data);
    }
}
