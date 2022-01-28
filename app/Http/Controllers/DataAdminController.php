<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataAdminStore;
use App\Http\Requests\EditDataAdminRequest;
use App\Models\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data['admin'] = UserModel::all();
        return view('admin/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['admin'] = UserModel::all();

        return view('admin/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataAdminStore $request)
    {
        try {
            UserModel::insert([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('data-admin.index')->with(['success' => 'Admin ' . ucwords($request->nama_baju) . ' Telah Tersimpan']);
        } catch (\Throwable $th) {
            Log::debug('Error DataAdmin function store');
            Log::debug($th);
            return redirect()->route('data-admin.index')->with(['error' => 'Aplikasi Error']);
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
        $user = UserModel::find($id);
        return view('admin/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDataAdminRequest $request, $id)
    {
        try {
            UserModel::where('id', $id)->update([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status_user,
                'isactive' => $request->isactive,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->route('data-admin.index')->with(['success' => 'Admin  Telah Diubah']);
        }catch (\Throwable $th) {
                Log::debug('Error DataAdmin function update');
                Log::debug($th);
                return redirect()->route('data-admin.index')->with(['error' => 'Aplikasi Error']);
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
        return redirect()->route('data-admin.index')->with(['error' => ucwords('Tidak Dapat Dihapus, mohon non aktifkan')]);
    }
}
