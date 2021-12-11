<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\DataParentContract;
use App\Models\{DataSPP, Siswa, UserModel};

class UserService implements DataParentContract
{

    /** Data User Parent with they Student/Kid
     * @return object
     */

    public function dataParentWithStudent(): object
    {
        $user = UserModel::datasParent()->map(function ($item) {
            $encoded = json_decode($item->siswa_ortu);

            // parent dont have student
            if (empty($encoded)) {
                return [];
            }

            if (!empty($encoded)) {
                /** find parent student and add to array $data_student; */
                foreach ($encoded as $student) {
                    $relation_student = Siswa::with('masterKelas', 'tahunAjaran')
                                        ->where('NIS_siswa', $student)
                                        ->first();
                    $data_student[] = $relation_student;
                }
            }

            // replace the key
            $item->siswa_ortu = (!empty($data_student)) ? $data_student : [];
            return $item;
        });
        return $user;
    }

    public function dataParentWithSPP(): object
    {
        /** find parent */
        $parent = UserModel::userParent()->map(function ($item) {
            $encoded = json_decode($item->siswa_ortu);

            // parent dont have student
            if (empty($encoded)) {
                return [];
            }

            if (!empty($encoded)) {

                foreach ($encoded as $student) {

                    $dataSPP = DataSPP::with('siswaData','masterKelas', 'tahunAjaran')
                                        ->where('NIS_siswa', $student)
                                        ->whereIn('status_spp',['belum_lunas', 'tertunggak'])
                                        ->orderBy('id_spp', 'desc')
                                        ->get();
                }
            }

            // replace the key
            $item->data_spp = (!empty($dataSPP)) ? $dataSPP : [];
            return $item;
        });
        return $parent;
    }

}
