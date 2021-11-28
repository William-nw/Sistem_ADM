<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAllStore;
use App\Http\Services\AdministrationService;
use App\Models\MasterBaju;
use App\Models\MasterBuku;
use App\Models\MasterKelas;
use App\Models\MasterTahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterAllController extends Controller
{

    public function __construct()
    {
        $this->administration_service = new AdministrationService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['kelas'] = MasterKelas::all();
        $data['tahun_ajaran'] = MasterTahunAjaran::all();
        $data['buku'] = MasterBuku::with('masterKelas', 'masterTahunAjaran')->get();
        $data['baju'] = MasterBaju::with('masterKelas')->get();

        return view('pembayaran/index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterAllStore $request)
    {
        DB::beginTransaction();

        try {
            // service on constructor
            $this->administration_service->registerStudent($request);
            $this->administration_service->administrationConstruction($request);
            // optional
            $this->administration_service->optionalAdministration($request);

            DB::commit();
            return redirect()->route('data-siswa.index')->with(['success' => 'Siswa Sukses Terdaftar, Mohon Check Berkas a/n '. ucwords($request->nama_siswa) ]);
        }catch (\Exception $e)
        {
            DB::rollback();
            Log::debug('Error RegisterAllController function store');
            log::debug($e);
            return redirect()->route('data-siswa.index')->with(['error' => $e->getMessage()]);

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
