<?php

namespace App\Http\Controllers;

use App\Http\Requests\AkunBankStore;
use App\Models\MasterAkunBank;
use App\Models\MasterTahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Xendit\Xendit;

class AkunBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // secret key xendit on AppServiceProvider
        $data['banks'] = MasterAkunBank::orderBy('id_bank_account', 'desc')->get();

        return view('akun-bank.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun-bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AkunBankStore $request)
    {
        DB::beginTransaction();

        try {
            // secret key xendit on AppServiceProvider
            $timestamp = date_timestamp_get(date_create());
            $random_number = rand(199999,999999999) * rand(1,9);

            $params = [
                "external_id" => "VA_fixed-". $timestamp . $random_number,
                "bank_code" => $request->bank_account,
                "name" => $request->nama_pemilik_rekening
            ];

            /**
             * docs: https://developers.xendit.co/api-reference/?php#create-virtual-account
             */
            $res_VA = \Xendit\VirtualAccounts::create($params);

            // function on model
            MasterAkunBank::insertVirtualAccount($request, $res_VA);
            DB::commit();

            return redirect()->route('akun-bank.index')->with(['success' => 'Virtual Account Sedang Diproses']);
        }catch (\Exception $e)
        {
            DB::rollback();
            log::debug($e);
            return redirect()->route('akun-bank.index')->with(['error' => $e->getMessage()]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
