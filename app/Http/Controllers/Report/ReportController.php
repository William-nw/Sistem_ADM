<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\{AdministrationConstruction, PaymentDetailSPP};
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
}
