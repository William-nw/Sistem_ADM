<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterOrtuStore;
use App\Models\Siswa;
use App\Models\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DataOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['ortu'] = UserModel::all();
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
        try {
            UserModel::insert([
                'name' => $request->nama_orang_tua,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password),
                'siswa_ortu' => $request->siswa_ortu,
                'status' => 'orang_tua',
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('data-ortu.index')->with(['success' => 'Orang Tua '. ucwords($request->nama_baju). ' Telah Tersimpan']);
        } catch (\Throwable $th) {
            Log::debug('Error MasterOrtu function store');
            Log::debug($th);
            return redirect()->route('data-ortu.index')->with(['error' => 'Aplikasi Error']);
        }
        dd($request->all());
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
