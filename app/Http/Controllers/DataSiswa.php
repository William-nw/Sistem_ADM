<?php

namespace App\Http\Controllers;

use App\Models\MasterKelas;
use App\Models\MasterTahunAjaran;
use Illuminate\Http\Request;
Use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class DataSiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['siswa'] = Siswa::all();

        return view('siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data['kelas'] = MasterKelas::all();
        $data['tahun_ajaran'] = MasterTahunAjaran::all();
            // try {
            //     Siswa::insert([
            //         'NIS_siswa ' =>  ucwords($request->nis_siswa),
            //         'nama_siswa'=>  $request->nama_siswa,
            //         'tingkat'=>  $request->tingkat,
            //         'kelas'=>  $request->kelas,
            //         'tahun_ajaran'=>  $request->tahun_ajaran,
            //         'created_at' > Carbon::now()
            //     ]);
    
            //     return redirect()->route('data-siswa.index')->with(['success' => 'Siswa '. $request->nama_siswa. ' Telah Tersimpan']);
            // } catch (\Throwable $th) {
            //     Log::debug('Error MasterBukuController function store');
            //     Log::debug($th);
            //     return redirect()->route('data-siswa.index')->with(['error' => 'Aplikasi Error']);
            // }
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
        $data['siswa'] = Siswa::all();

        return view('siswa/edit',['siswa' => $data]);
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
