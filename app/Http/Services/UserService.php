<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\DataParentContract;
use App\Models\Siswa;
use App\Models\UserModel;

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

                            foreach ($encoded as $student)
                            {
                               $student = Siswa::with('masterKelas','tahunAjaran')
                                               ->where('id', $student)
                                               ->first();
                               $data_student[] = $student;
                            }

                            // replace the key
                            $item->siswa_ortu = $data_student;
                            return $item;
                        });
        return $user;
    }

}
