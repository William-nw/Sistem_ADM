<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterOrtuStore;
use App\Http\Services\{AdministrationService, UserService};
use App\Http\Requests\MasterOrtuUpdate;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\{Siswa, UserModel};
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
        $data['siswa'] = Siswa::with('masterKelas', 'tahunAjaran')->get();

        return view('ortu-siswa/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterOrtuStore $request)
    {
        DB::beginTransaction();

        try {
            $this->administration_service->registerParentWithStudent($request);

            DB::commit();
            return redirect()->route('data-ortu.index')->with(['success' => 'Pendaftaran Orang Tua ' . ucwords($request->nama_orang_tua) . ' Sukses']);
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
        $data['siswa'] = Siswa::with('masterKelas', 'tahunAjaran')->get();
        $data['ortu'] = UserModel::find($id);

        return view('ortu-siswa/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MasterOrtuUpdate $request, $id)
    {
        try {
            $convert_to_object = (object)$request->siswa_ortu;
            if (is_null($request->password)) {
                User::where('id', $id)->update([
                    'name' => $request->nama_orang_tua,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'siswa_ortu' => json_encode($convert_to_object),
                    'status' => 'orang_tua',
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                User::where('id', $id)->update([
                    'name' => $request->nama_orang_tua,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'no_hp' => $request->no_hp,
                    'siswa_ortu' => json_encode($convert_to_object),
                    'status' => 'orang_tua',
                    'created_at' => Carbon::now(),
                ]);
            }
            return redirect()->route('data-ortu.index')->with(['success' => 'Data Ortu Sukses diubah']);
        } catch (\Throwable $th) {
            Log::debug('Error DataOrtuController function update');
            Log::debug($th);
            return redirect()->route('data-ortu.index')->with(['error' => 'Aplikasi Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
