<?php

namespace App\Jobs;

use App\Models\{BooksMoney, PaymentBooks, StudentSavings};
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AutoDebtBooks implements ShouldQueue
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
            $books = BooksMoney::whereIn('status_buku', ['belum_lunas', 'tertunggak'])->get();

            // pay book
            foreach ($books as $book) {
                $saving = StudentSavings::where('NIS_siswa', $book->NIS_siswa)->first();

                if ($saving->total_tabungan > 0 ) { // have balance
                    // code Payment Books
                    $inv_number = 'PAID-BUKU-' . Str::random(10) . date('yMd');
                    $balance = $saving->total_tabungan - $book->total_harga_buku; //ex 50 -100 = -50

                    // update pay Administration
                    PaymentBooks::insert([
                        'kode_pembayaran_buku' => $inv_number,
                        'id_uang_buku' => $book->id_uang_buku,
                        'NIS_siswa' => $book->NIS_siswa,
                        'tanggal_pembayaran' => Carbon::now(),
                        'total_pembayaran_buku' => ($balance >= 0) ? $book->total_harga_buku : $saving->total_tabungan,
                        'created_at' => Carbon::now(),
                    ]);

                    $data_book = BooksMoney::where('id_uang_buku', $book->id_uang_buku)->first();
                    $data_book->update([
                        'status_buku' => ($balance >= 0) ? 'lunas' : 'belum_lunas',
                        'total_harga_buku' => ($balance >= 0) ? 0 : abs($balance) , //ex 50 -100 = -50
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
            Log::debug('error Auto Debt Books');
            Log::debug($ex);
        }
    }
}
