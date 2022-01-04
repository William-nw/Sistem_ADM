<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\DataParentContract;
use App\Models\{AdministrationConstruction,
    BooksMoney,
    ClothesMoney,
    ConsumptionMoney,
    DataSPP,
    PaymentBooks,
    PaymentClothes,
    PaymentConstruction,
    PaymentConsumption,
    Siswa,
    StudentSavings,
    UserModel};

class UserService implements DataParentContract
{
    /** Data User Parent with they Student/Kid
     * @return object
     */
    public function parentWithStudent(): object
    {
        $user = UserModel::userParent()->map(function ($item) {
            $encoded = json_decode($item->siswa_ortu);

            // parent dont have student
            if (empty($encoded)) {
                return [];
            }

            if (!empty($encoded)) {
                /** find parent student and add to array $data_student; */
                foreach ($encoded as $student) {
                    $child[] = Siswa::with('masterKelas', 'tahunAjaran')
                        ->where('NIS_siswa', $student)
                        ->first();

                    $savingAccount[$student]= StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->siswa_ortu = (!empty($child)) ? $child : [];
            $item->studentSaving = (!empty($savingAccount)) ? $savingAccount : [];
            return $item;
        });
        return $user;
    }

    /** All Data User Parent with they Student/Kid
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
                //                        ->whereIn('status_pembangunan',['belum_lunas', 'tertunggak'])
                                        ->orderBy('id_uang_pembangunan', 'desc')
                                        ->first();
                    $data_payment_const = PaymentConstruction::with('siswaData')
                                            ->where('NIS_siswa', $student)
                                            ->orderBy('id_uang_pembangunan', 'desc')->get();

                    $savingAccount[$student]= StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataConstruction)) ? $dataConstruction : [];
            $item->data_payment_construction = (!empty($data_payment_const)) ? $data_payment_const : [];
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
                        //                        ->whereIn('status_buku',['belum_lunas', 'tertunggak'])
                                                ->orderBy('id_uang_buku', 'desc')
                                                ->first();
                    $data_payment_books = PaymentBooks::with('siswaData')
                                            ->where('NIS_siswa', $student)
                                            ->orderBy('id_pembayaran_buku', 'desc')->get();

                    $savingAccount[$student] = StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataBooksAdministration)) ? $dataBooksAdministration : [];
            $item->data_payment_books = (!empty($data_payment_books)) ? $data_payment_books : [];
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
                            //                        ->whereIn('status_baju',['belum_lunas', 'tertunggak'])
                                                    ->orderBy('id_uang_baju', 'desc')
                                                    ->first();
                    $data_payment_clothes = PaymentClothes::with('siswaData')
                                        ->where('NIS_siswa', $student)
                                        ->orderBy('id_pembayaran_baju', 'desc')->get();
                    $savingAccount[$student] = StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataClothesAdministration)) ? $dataClothesAdministration : [];
            $item->data_payment_clothes = (!empty($data_payment_clothes)) ? $data_payment_clothes : [];

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
//                        ->whereIn('status_konsumsi',['belum_lunas', 'tertunggak'])
                        ->orderBy('id_uang_konsumsi', 'desc')
                        ->first();
                    $data_payment_consumption = PaymentConsumption::with('siswaData')
                        ->where('NIS_siswa', $student)
                        ->orderBy('id_uang_konsumsi', 'desc')->get();
                    $savingAccount[$student] = StudentSavings::getStudentSavingAccount($student);
                }
            }

            // replace the key
            $item->data_administration = (!empty($dataConsumptionAdministration)) ? $dataConsumptionAdministration : [];
            $item->data_payment_consumption = (!empty($data_payment_consumption)) ? $data_payment_consumption : [];
            $item->studentSaving = (!empty($savingAccount)) ? $savingAccount : [];
            return $item;
        });
        return $parent;
    }

}
