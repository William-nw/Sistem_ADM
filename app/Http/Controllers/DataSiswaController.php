<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationSiswa;
use App\Models\MasterKelas;
use App\Models\MasterTahunAjaran;
use Illuminate\Http\Request;
Use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function GuzzleHttp\Promise\all;
use function Psy\debug;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $data['siswa'] = Siswa::with('masterKelas','tahunAjaran')->get();

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
        $data['siswa'] = Siswa::all();
        $data['kelas'] = MasterKelas::all();
        $data['tahun_ajaran'] = MasterTahunAjaran::all();
        return view('siswa/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationSiswa $request)
    {
        //
            try {
                Siswa::insert([
                    'NIS_siswa' => $request->nis_siswa,
                    'nama_siswa'=>  $request->nama_siswa,
                    'tingkat'=>  $request->tingkat,
                    'kelas'=>  $request->kelas,
                    'tahun_ajaran'=>  $request->tahun_ajaran,
                    'created_at' => Carbon::now()
                ]);
                return redirect()->route('data-siswa.index')->with(['success' => 'Siswa '. $request->nama_siswa. ' Telah Tersimpan']);
            } catch (\Throwable $th) {
                Log::debug('Error DataSiswa function store');
                Log::debug($th);
                return redirect()->route('data-siswa.index')->with(['error' => 'Aplikasi Error']);
            }
        // dd($request->all());

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
        $data['siswa'] = Siswa::with('masterKelas','tahunAjaran')
                            ->where('id', $id)
                            ->first();
        $data['kelas'] = MasterKelas::all();
        $data['tahunAjaran'] = MasterTahunAjaran::all();

        return view('siswa/edit', $data);
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
