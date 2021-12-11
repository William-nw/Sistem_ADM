<?php

namespace App\Http\Traits;

use App\Models\{DataSPP, DetailSPP, Siswa, StudentSavings};
use Carbon\Carbon;
use Illuminate\Support\Str;

trait RegisterStudent
{

    /**
     * Register Siswa
     * @param object $request
     * @return void
     */
    public function createAdministrationStudent(object $request): void
    {
        Siswa::insert([
            'NIS_siswa' => $request->nis_siswa,
            'nama_siswa'=>  ucwords($request->nama_siswa),
            'tingkat'=>  $request->tingkat,
            'kelas'=>  $request->kelas,
            'tahun_ajaran'=>  $request->tahun_ajaran,
            'created_at' => Carbon::now()
        ]);

        //create virtual account from PaymentGatewayService
        $res_va = $this->createVirtualAccount($request);

        // create saving account student
        $this->registerSavingAccount($request, $res_va);

        //create spp student
        $this->sppSiswa($request);
    }

    /** register student saving account
     * @param object $request
     * @param array $res_va
     * @return void
     */
    public function registerSavingAccount(object $request, array $res_va): void
    {
        StudentSavings::updateOrCreate(
            [
                'NIS_siswa' => $request->nis_siswa,
                'external_id' => $res_va['external_id'],
            ],
            [
                'NIS_siswa' => $request->nis_siswa,
                'external_id' => $res_va['external_id'],
                'created_at' => Carbon::now()
            ]
        );
    }

    /** Spp siswa from contracs(interface)
     * @param object $data_siswa
     * @return void
     */
    public function sppSiswa(object $data_siswa): void
    {
        // code SPP
        $inv_number = 'SPP-' . Str::random(10) . date('yMd');

        DataSPP::insert([
            'kode_spp' => $inv_number,
            'NIS_siswa' => $data_siswa->nis_siswa,
            'tingkat' => $data_siswa->tingkat,
            'kelas' => $data_siswa->kelas,
            'tahun_ajaran' => $data_siswa->tahun_ajaran,
            'total_spp' => ($data_siswa->uang_spp * 12),
            'status_spp' => 'belum_lunas',
            'created_at' => Carbon::now()
        ]);

        // add to detail spp 12 month
        $this->generateSPP($inv_number, $data_siswa->nis_siswa, $data_siswa->uang_spp);
    }

    /** Generate spp 12 month
     * from contracs(interface)
     * @param string $inv_number
     * @param string $NIS_siswa
     * @param string $uang_spp
     * @return void
     */
    public function generateSPP(string $inv_number, string $NIS_siswa, string $uang_spp): void
    {
        for ($bulan=0; $bulan < 12; $bulan++)
        {
            $due_date = date("Y-m-d", strtotime("+". $bulan . "month") );
            $month = date("m", strtotime("+". $bulan . "month") );

            DetailSPP::insert([
                'kode_spp' => $inv_number,
                'NIS_siswa' => $NIS_siswa,
                'jatuh_tempo' => $due_date,
                'bulan' => $month,
                'total_spp' => $uang_spp,
                'status_detail_spp' => 'belum_lunas',
                'created_at' => Carbon::now(),
            ]);
        }
    }

}
