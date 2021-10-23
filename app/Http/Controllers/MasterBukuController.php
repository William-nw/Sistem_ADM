<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterBukuStore;
use App\Models\MasterBuku;
use App\Models\MasterKelas;
use App\Models\MasterTahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasterBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['buku'] = MasterBuku::with('masterKelas', 'masterTahunAjaran')->get();
        
        return view('master-buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kelas'] = MasterKelas::all();
        $data['tahun_ajaran'] = MasterTahunAjaran::all();

        return view('master-buku/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterBukuStore $request)
    {
        
        try {
            MasterBuku::insert([
                'nama_buku' => ucwords($request->nama_buku),
                'kelas' => $request->kelas,
                'tahun_ajaran' => $request->tahun_ajaran,
                'harga_buku' => $request->harga_buku,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('master-buku.index')->with(['success' => 'Buku '. ucwords($request->nama_buku). ' Telah Tersimpan']);
        } catch (\Throwable $th) {
            Log::debug('Error MasterBukuController function store');
            Log::debug($th);
            return redirect()->route('master-buku.index')->with(['error' => 'Aplikasi Error']);
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
        $data['buku'] = MasterBuku::find($id);
        

        return view('master-buku/edit', $data);
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
