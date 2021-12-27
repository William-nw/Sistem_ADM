<?php

namespace App\Http\Controllers\ParentStudent;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\DataSPP;
use App\Models\DetailSPP;
use App\Models\StudentSavings;
use Illuminate\Http\Request;

class DataSppSiswaOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->user_service = new UserService();

        $data['ortu'] = $this->user_service->dataParentWithSPP();

        return view('ortu-siswa/spp-siswa.index', $data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['spp'] = DataSPP::with('detailSppStudent','siswaData','masterKelas', 'tahunAjaran')
                                ->where('kode_spp', $id)
                                ->first();

        $data['studentSaving'] = StudentSavings::getStudentSavingAccount($data['spp']->NIS_siswa);

        return view('ortu-siswa/spp-siswa.show', $data);

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
