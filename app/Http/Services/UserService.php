<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\DataParentContract;
use App\Models\DetailSPP;
use App\Models\Siswa;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class UserService implements DataParentContract
{

    /** Data User Parent with they Student/Kid
     * @return object
     */

    public function dataParentWithStudent(): object
    {

        $user = UserModel::select('id', 'name', 'email', 'no_hp', 'siswa_ortu','status')
                        ->where('status', 'orang_tua')
                        ->get()->map(function($item){
                            $encoded = json_decode($item->siswa_ortu);

                            if( !empty($encoded) )
                            {
                                foreach ($encoded as $student)
                                {
                                    $student = Siswa::with('masterKelas','tahunAjaran')
                                        ->where('id', $student)
                                        ->first();
                                    $data_student[] = $student;
                                }
                            }

                            // replace the key
                            $item->siswa_ortu = ( !empty($data_student) ) ? $data_student : [];
                            return $item;
                        });
        return $user;
    }
    public function dataParentWithSPP(): object
    {

        $orangtua = UserModel::with('name')->where('id', Auth::user()->id)->firstOrFail();

        $user = UserModel::select('id', 'name', 'email', 'no_hp', 'siswa_ortu','status')
                        ->where('status', 'orang_tua')
                        ->get()->map(function($item){
                            $encoded = json_decode($item->siswa_ortu);

                            if( !empty($encoded) )
                            {
                                foreach ($encoded as $dataSPP)
                                {
                                    $dataSPP = DetailSPP::where('id', $dataSPP)
                                        ->first();
                                    $data_spp[] = $dataSPP;
                                }
                                foreach ($encoded as $student)
                                {
                                $student = Siswa::with('masterKelas','tahunAjaran')
                                        ->where('id', $student)
                                        ->first();
                                    $data_student[] = $student;
                                }
                            }

                            // replace the key
                            $item->siswa_ortu = ( !empty($data_spp) ) ? $data_spp : [];
                            return $item;
                        });
        return $user;
    }

}
