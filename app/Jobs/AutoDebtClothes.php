<?php

namespace App\Jobs;

use App\Models\{ClothesMoney,PaymentClothes,StudentSavings};
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AutoDebtClothes implements ShouldQueue
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
            $clothes = ClothesMoney::whereIn('status_baju', ['belum_lunas', 'tertunggak'])->get();

            // pay clothes
            foreach ($clothes as $cloth) {
                $saving = StudentSavings::where('NIS_siswa', $cloth->NIS_siswa)->first();

                if ($saving->total_tabungan > 0 ) { // have balance
                    // code Payment Clothes
                    $inv_number = 'PAID-BAJU-' . Str::random(10) . date('yMd');
                    $balance = $saving->total_tabungan - $cloth->total_harga_baju; //ex 50 -100 = -50

                    // update pay Administration
                    PaymentClothes::insert([
                        'kode_pembayaran_baju' => $inv_number,
                        'id_uang_baju' => $cloth->id_uang_baju,
                        'NIS_siswa' => $cloth->NIS_siswa,
                        'tanggal_pembayaran' => Carbon::now(),
                        'total_pembayaran_baju' => ($balance >= 0) ? $cloth->total_harga_baju : $saving->total_tabungan,
                        'created_at' => Carbon::now(),
                    ]);

                    $data_clothes = ClothesMoney::where('id_uang_baju', $cloth->id_uang_baju)->first();
                    $data_clothes->update([
                        'status_baju' => ($balance >= 0) ? 'lunas' : 'belum_lunas',
                        'total_harga_baju' => ($balance >= 0) ? 0 : abs($balance) , //ex 50 -100 = -50
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
            Log::debug('error Auto Debt Clothes');
            Log::debug($ex);
        }
    }
}
