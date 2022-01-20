<?php

namespace App\Jobs;

use App\Models\{ConsumptionMoney,PaymentConsumption,StudentSavings};
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AutoDebtConsumption implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            //find Consumption not yet paid off
            $consumption = ConsumptionMoney::whereIn('status_konsumsi', ['belum_lunas', 'tertunggak'])->get();

            // pay book
            foreach ($consumption as $consump) {
                $saving = StudentSavings::where('NIS_siswa', $consump->NIS_siswa)->first();

                if ($saving->total_tabungan > 0 ) { // have balance
                    // code Construction
                    $inv_number = 'PAID-KONSUMSI-' . Str::random(10) . date('yMd');
                    $balance = $saving->total_tabungan - $consump->total_biaya; //ex 50 -100 = -50

                    // update pay Administration

                    PaymentConsumption::insert([
                        'id_uang_konsumsi' => $consump->id_uang_konsumsi,
                        'NIS_siswa' => $consump->NIS_siswa,
                        'kode_pembayaran' => $inv_number,
                        'tanggal_bayar' => Carbon::now(),
                        'total_pembayaran' => ($balance >= 0) ? $consump->total_biaya : $saving->total_tabungan,
                        'keterangan' => 'Auto Debet By System',
                        'created_at' => Carbon::now(),
                    ]);

                    $data_construction = ConsumptionMoney::where('id_uang_konsumsi', $consump->id_uang_konsumsi)
                        ->first();
                    $data_construction->update([
                        'status_konsumsi' => ($balance >= 0) ? 'lunas' : 'belum_lunas',
                        'total_biaya' => ($balance >= 0) ? 0 : abs($balance) , //ex 50 -100 = -50
                        'updated_at' => Carbon::now(),
                    ]);

                    StudentSavings::where('NIS_siswa', $saving->NIS_siswa)
                        ->update([
                            'total_tabungan' => ($balance < 0) ? 0 : $balance,
                            'updated_at' => Carbon::now(),
                        ]);
                }
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::debug('error Auto Debt Consumption');
            Log::debug($ex);
        }
    }
}
