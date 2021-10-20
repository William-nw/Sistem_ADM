<?php

namespace App\Http\Controllers;

use App\Models\CallbackPayment;
use App\Models\MasterAkunBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['callback_payment'] = CallbackPayment::with(['masterBankAccount'])->orderBy('id_callback_pembayaran', 'desc')->get();

        return view('test-payment.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['banks'] = MasterAkunBank::orderBy('id_bank_account', 'desc')->get();
        return view('test-payment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $url = 'https://api.xendit.co/callback_virtual_accounts/external_id=' . $request->bank_account . '/simulate_payment';
            $amount = array('amount' => 50000); // default amount

            $response = Http::withBasicAuth(env('xendit_key').":", '')
                ->asForm()
                ->post($url, $amount)
                ->json();

            if (array_key_exists('error_code', $response) )
            {
                $index = 'error';
                $message = $response['message'];
                DB::rollBack();
            }else{
                $index = 'success';
                $message = 'Pembayaran Virtual Account Diproses.. Terima Kasih';
                DB::commit();
            }

            return redirect()->route('test-payment.index')->with([$index => $message]);
        }catch (\Throwable $e)
        {
            DB::commit();
            log::debug('error PaymentController function store');
            log::debug($e);

            return redirect()->route('test-payment.index')->with(['error' => 'Terjadi Kesalahan Pada Aplikasi']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
