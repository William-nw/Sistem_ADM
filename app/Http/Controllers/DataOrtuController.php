<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterOrtuStore;
use App\Http\Services\AdministrationService;
use App\Http\Services\UserService;
use App\Models\Siswa;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DataOrtuController extends Controller
{

    public function __construct()
    {
        $this->administration_service = new AdministrationService();
        $this->user_service = new UserService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // login on construct
        $data['ortu'] = $this->user_service->dataParentWithStudent();

        return view('ortu-siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['siswa'] = Siswa::all();
        $data['ortu'] = UserModel::all();

        return view('ortu-siswa/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterOrtuStore $request)
    {
        DB::beginTransaction();

        try {
            $this->administration_service->registerParentWithStudent($request);

            DB::commit();
            return redirect()->route('data-ortu.index')->with(['success' => 'Pendaftaran Orang Tua '. ucwords($request->nama_orang_tua). ' Sukses']);
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug('Error DataOrtuController function store');
            Log::debug($th);
            return redirect()->route('data-ortu.index')->with(['error' => 'Aplikasi Error']);
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
        $ortu = UserModel::find($id);


        return view('data-ortu/edit',['ortu' => $ortu]);
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

    }
}
