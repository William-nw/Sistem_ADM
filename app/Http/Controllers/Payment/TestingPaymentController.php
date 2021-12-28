<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestingPaymentRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TestingPaymentController extends Controller
{
    public function __construct()
    {
        $this->user_service = new UserService();
    }

    /** get Administration **/
    public function index()
    {
        $data['siswa'] = $this->user_service->parentWithStudent();
//        dd($data);
        return view('ortu-siswa/test-pembayaran.test-pembayaran', $data);
    }

    /** your docs block **/
    public function simulatePayment(TestingPaymentRequest $request)
    {
        try {
            $url = 'https://api.xendit.co/callback_virtual_accounts/external_id=' . $request->account_va . '/simulate_payment';
            $amount = array('amount' => $request->amount_transfer); // default amount

            $response = Http::withBasicAuth(env('xendit_key').":", '')
                ->asForm()
                ->post($url, $amount)
                ->json();

            if (array_key_exists('error_code', $response) )
            {
                $index = 'error';
                $message = $response['message'];
            }else{
                $index = 'success';
                $message = 'Pembayaran Virtual Account Diproses.. Terima Kasih';
            }
            return redirect()->route('testing-payment.index')->with([$index => $message]);
        }catch (\Throwable $e){
            log::debug('error PaymentController function store');
            log::debug($e);

            return redirect()->route('test-payment.index')->with(['error' => 'Terjadi Kesalahan Pada Aplikasi']);
        }

    }
}
