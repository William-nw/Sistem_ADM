<?php

namespace App\Http\Controllers;

use App\Models\MasterKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $master_kelas = MasterKelas::all();

        return view('master-kelas/index',['master_kelas' => $master_kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master-kelas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            MasterKelas::insert([
                'nama_kelas' => $request->nama_kelas,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('master-kelas.index')->with(['success' => 'Kelas '. ucwords($request->nama_baju). ' Telah Tersimpan']);
        } catch (\Throwable $th) {
            Log::debug('Error MasterKelasController function store');
            Log::debug($th);
            return redirect()->route('master-kelas.index')->with(['error' => 'Aplikasi Error']);
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
        $master_kelas = MasterKelas::find($id);


        return view('master-kelas/edit',['master_kelas' => $master_kelas]);
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
