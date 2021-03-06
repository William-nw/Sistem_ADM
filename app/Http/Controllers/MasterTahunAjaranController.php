<?php

namespace App\Http\Controllers;

use App\Http\Requests\TahunAjaranStore;
use App\Models\MasterTahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasterTahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $tahun_ajaran = MasterTahunAjaran::all();

        return view('master-tahun-ajaran/index',['tahun_ajaran' => $tahun_ajaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master-tahun-ajaran/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TahunAjaranStore $request)
    {
        try {
            MasterTahunAjaran::insert([
                'nama_tahun_ajaran' => $request->nama_tahun_ajaran,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('master-tahun-ajaran.index')->with(['success' => 'Tahun Ajaran '. ucwords($request->nama_baju). ' Telah Tersimpan']);
        } catch (\Throwable $th) {
            Log::debug('Error MasterTahunAjaranController function store');
            Log::debug($th);
            return redirect()->route('master-tahun-ajaran.index')->with(['error' => 'Aplikasi Error']);
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
        $tahun_ajaran = MasterTahunAjaran::find($id);

        return view('master-tahun-ajaran/edit',['tahun_ajaran' => $tahun_ajaran]);
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
