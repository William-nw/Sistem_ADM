<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterBajuStore;
use App\Models\MasterBaju;
use App\Models\MasterKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MasterBajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['baju'] = MasterBaju::with('masterKelas', )->get();
        
        return view('master-baju.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kelas'] = MasterKelas::all();

        return view('master-baju/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterBajuStore $request)
    {
        try {
            MasterBaju::insert([
                'nama_baju' => ucwords($request->nama_baju),
                'ukuran_baju' => $request->ukuran_baju,
                'kelas' => $request->kelas,
                'harga_baju' => $request->harga_baju,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('master-baju.index')->with(['success' => 'Baju '. ucwords($request->nama_baju). ' Telah Tersimpan']);
        } catch (\Throwable $th) {
            Log::debug('Error MasterBajuController function store');
            Log::debug($th);
            return redirect()->route('master-baju.index')->with(['error' => 'Aplikasi Error']);
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
