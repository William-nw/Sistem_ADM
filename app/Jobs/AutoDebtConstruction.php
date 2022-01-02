<?php

namespace App\Jobs;

use App\Models\{AdministrationConstruction, PaymentConstruction, StudentSavings};
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AutoDebtConstruction implements ShouldQueue
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
            //find clothes not yet paid off
            $construction = AdministrationConstruction::whereIn('status_pembangunan', ['belum_lunas', 'tertunggak'])->get();
            // pay book
            foreach ($construction as $const) {
                $saving = StudentSavings::where('NIS_siswa', $const->NIS_siswa)->first();

                if ($saving->total_tabungan > 0 ) { // have balance
                    // code Construction
                    $inv_number = 'PAID-PEMBAGUNAN-' . Str::random(10) . date('yMd');
                    $balance = $saving->total_tabungan - $const->total_biaya; //ex 650 - 800 = -150

                    // update pay Administration

                    PaymentConstruction::insert([
                        'id_uang_pembangunan' => $const->id_uang_pembangunan,
                        'NIS_siswa' => $const->NIS_siswa,
                        'kode_pembayaran' => $inv_number,
                        'tanggal_bayar' => Carbon::now(),
                        'total_pembayaran' => ($balance >= 0) ? $const->total_biaya : $saving->total_tabungan,
                        'keterangan_angsuran' => 'Auto Debet By System',
                        'created_at' => Carbon::now(),
                    ]);

                    $data_construction = AdministrationConstruction::where('id_uang_pembangunan', $const->id_uang_pembangunan)
                                        ->first();

                    $data_construction->update([
                        'status_pembangunan' => ($balance >= 0) ? 'lunas' : 'belum_lunas',
                        'keterangan_angsuran' => 'Auto Debet By System',
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
            Log::debug('error Auto Debt Construction');
            Log::debug($ex);
        }
    }
}
