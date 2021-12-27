<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Services\ReportAdministrationService;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->report_administration_service = new ReportAdministrationService;
    }

    public function ContructionAdmininstration()
    {
        $data['administration'] = $this->report_administration_service->ConstructionAdministrationStudent();

        return view ('ortu-siswa/data-pembayaran.uang-pembangunan', $data);
    }

    public function BooksAdmininstration()
    {
        $data['administration'] = $this->report_administration_service->BooksAdministrationStudent();
        return view('ortu-siswa/data-pembayaran.uang-buku', $data);
    }

    public function ClothesAdmininstration()
    {
        $data['administration'] = $this->report_administration_service->ClothesAdministrationStudent();
        return view('ortu-siswa/data-pembayaran.uang-baju',$data);
    }

    public function ConsumptionAdmininstration()
    {
        $data['administration'] = $this->report_administration_service->ConsumptionAdministrationStudent();
//        dd($data);
        return view('ortu-siswa/data-pembayaran.uang-konsumsi', $data);
    }
}
