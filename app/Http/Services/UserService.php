<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\DataParentContract;
use App\Models\{AdministrationConstruction,
    BooksMoney,
    ClothesMoney,
    ConsumptionMoney,
    DataSPP,
    Siswa,
    StudentSavings,
    UserModel};

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
                    $dataSPP[] = DataSPP::with('siswaData','masterKelas', 'tahunAjaran')
                                        ->where('NIS_siswa', $student)
                                        ->whereIn('status_spp',['belum_lunas', 'tertunggak'])
                                        ->orderBy('id_spp', 'desc')
                                        ->first();
                }
            }

            // replace the key
            $item->data_spp = (!empty($dataSPP)) ? $dataSPP : [];
            return $item;
        });
        return $parent;
    }

    public function dataParentWithConstruction(): object
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

                    $dataConstruction[] = AdministrationConstruction::with('siswaData','masterKelas', 'tahunAjaran')
                        ->where('NIS_siswa', $student)
                        ->whereIn('status_pembangunan',['belum_lunas', 'tertunggak'])
                        ->orderBy('id_uang_pembangunan', 'desc')
                        ->first();

                    $savingAccount[$student]= StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataConstruction)) ? $dataConstruction : [];
            $item->studentSaving = (!empty($savingAccount)) ? $savingAccount : [];
            return $item;
        });
        return $parent;
    }

    public function dataParentWithBooksAdministration(): object
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
                    $dataBooksAdministration[] = BooksMoney::with('siswaData','masterKelas', 'tahunAjaran')
                        ->where('NIS_siswa', $student)
                        ->whereIn('status_buku',['belum_lunas', 'tertunggak'])
                        ->orderBy('id_uang_buku', 'desc')
                        ->first();

                    $savingAccount[$student] = StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataBooksAdministration)) ? $dataBooksAdministration : [];
            $item->studentSaving = (!empty($savingAccount)) ? $savingAccount : [];
            return $item;
        });
        return $parent;
    }

    public function dataParentWithClothesAdministration(): object
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
                    $dataClothesAdministration[] = ClothesMoney::with('siswaData','masterKelas', 'tahunAjaran')
                        ->where('NIS_siswa', $student)
                        ->whereIn('status_baju',['belum_lunas', 'tertunggak'])
                        ->orderBy('id_uang_baju', 'desc')
                        ->first();
                    $savingAccount[$student] = StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataClothesAdministration)) ? $dataClothesAdministration : [];
            $item->studentSaving = (!empty($savingAccount)) ? $savingAccount : [];
            return $item;
        });
        return $parent;
    }

    public function dataParentWithConsumptionAdministration(): object
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
                    $dataConsumptionAdministration[] = ConsumptionMoney::with('siswaData','masterKelas')
                        ->where('NIS_siswa', $student)
                        ->whereIn('status_konsumsi',['belum_lunas', 'tertunggak'])
                        ->orderBy('id_uang_konsumsi', 'desc')
                        ->first();
                    $savingAccount[$student] = StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataConsumptionAdministration)) ? $dataConsumptionAdministration : [];
            $item->studentSaving = (!empty($savingAccount)) ? $savingAccount : [];
            return $item;
        });
        return $parent;
    }

}
