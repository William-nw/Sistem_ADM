<?php

namespace App\Jobs;

use App\Models\{DataSPP,DetailSPP,PaymentDetailSPP,StudentSavings};
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AutoDebtSPP implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            //find due date spp
            $detail_spp = DetailSPP::where('jatuh_tempo', '<=', date('Y-m-d', strtotime("now")))
                ->whereIn('status_detail_spp', ['belum_lunas', 'tertunggak'])
                ->get();
            // pay spp
            foreach ($detail_spp as $spp) {
                $saving = StudentSavings::where('NIS_siswa', $spp->NIS_siswa)->first();

                if ($saving->total_tabungan > $spp->total_spp) {
                    // code Payment SPP
                    $inv_number = 'PAID-SPP-' . Str::random(10) . date('yMd');
                    $balance = $saving->total_tabungan - $spp->total_spp; // ex 100-100 = 0

                    // update pay Administration
                    DetailSPP::where('id_detail_spp', $spp->id_detail_spp)
                        ->update([
                            'tanggal_pembayaran' => Carbon::now(),
                            'status_detail_spp' => 'lunas',
                            'updated_at' => Carbon::now(),
                        ]);

                    $data_spp = DataSPP::where('kode_spp', $spp->kode_spp)->first();
                    $current_amount_spp = $data_spp->total_spp - $spp->total_spp; // ex 200-100 = 100
                    $data_spp->update([
                        'status_spp' => ($current_amount_spp == 0) ? 'lunas' : 'belum_lunas',
                        'total_spp' => $current_amount_spp,
                        'updated_at' => Carbon::now(),
                    ]);

                    PaymentDetailSPP::insert([
                        'kode_spp' => $spp->id_detail_spp,
                        'kode_pembayaran' => $inv_number,
                        'NIS_siswa' => $spp->NIS_siswa,
                        'bulan' => $spp->bulan,
                        'tanggal_pembayaran' => Carbon::now(),
                        'total_bayar' => $spp->total_spp,
                        'created_at' => Carbon::now(),
                    ]);

                    StudentSavings::where('NIS_siswa', $saving->NIS_siswa)
                        ->update([
                            'total_tabungan' => $balance, // fix 0
                            'updated_at' => Carbon::now(),
                        ]);
                }
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::debug('error Auto Debt SPP');
            Log::debug($ex);
        }

    }

}
