<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\BuyingContract;
use App\Http\Services\Contracts\InvoiceRegisterContract;
use App\Http\Services\Contracts\RegisterContract;
use App\Http\Traits\RegisterStudent;
use App\Models\AdministrationConstruction;
use App\Models\BooksMoney;
use App\Models\ClothesMoney;
use App\Models\ConsumptionMoney;
use App\Models\MasterBaju;
use App\Models\MasterBuku;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministrationService extends PaymentGatewayService implements RegisterContract,InvoiceRegisterContract, BuyingContract
{

    // trait
    use RegisterStudent;

    /** Register Parent with his own children
     * @param object $request
     * @return void
     */
    public function registerParentWithStudent(object $request): void
    {
        $convert_to_object = (object) $request->siswa_ortu;

        User::insert([
            'name' => $request->nama_orang_tua,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'siswa_ortu' => json_encode($convert_to_object),
            'status' => 'orang_tua',
            'created_at' => Carbon::now()
        ]);
    }


    /** register Student
     * @param object $request
     * @return void
     */
    public function registerStudent(object $request): void
    {
        // logic at trait RegisterStudent
        $this->createAdministrationStudent($request);
    }

    /** administration Construction(Uang pembangunan)
     * @param object $request
     * @return void
     */
    public function administrationConstruction(object $request): void
    {
        // code construction
        $inv_construction = 'PMB-' . Str::random(10) . date('yMd');

        AdministrationConstruction::insert([
            'NIS_siswa' => $request->nis_siswa,
            'kode_pembangunan' => $inv_construction,
            'kelas' => $request->kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'total_biaya' => $request->uang_pembangunan,
            'status_pembangunan' => 'belum_lunas',
            'created_at' => Carbon::now()
        ]);
    }

    /** Student can buy clothes
     * @param object $request
     * @return void
     */
    public function buyClothes(object $request): void
    {
        $cart = $this->countBuyingItem($request,$request->baju_id, $request->baju);
        $total = 0;

        foreach($cart as $index_cart => $value_cart)
        {
            // search clothes
            $clothes = MasterBaju::select('id_baju','nama_baju','ukuran_baju','harga_baju')
                                    ->where('id_baju', $value_cart['id_item'])->first();

            // add new key and value
            $cart[$index_cart]["cloth_name"] = $clothes->nama_baju;
            $cart[$index_cart]["size"] = $clothes->ukuran_baju;
            $cart[$index_cart]["total"] = $clothes->harga_baju * $value_cart['qty'];

            // sum all item
            $total += $clothes->harga_baju * $value_cart['qty'];
        }

        // save clothes
        ClothesMoney::insert([
            'NIS_siswa' => $request->nis_siswa,
            'tingkat' => strtoupper($request->tingkat),
            'kelas' => $request->kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'data_baju' => json_encode($cart),
            'total_harga_baju' => (string) $total,
            'status_baju' => 'belum_lunas',
            'created_at' => Carbon::now()
        ]);
    }

    /** Student can buy books
     * @param object $request
     * @return void
     */
    public function buyBooks(object $request): void
    {
        $cart = $this->countBuyingItem($request,$request->buku_id, $request->buku);
        $total = 0;

        foreach($cart as $index_cart => $value_cart)
        {
            // search clothes
            $book = MasterBuku::select('id_buku','nama_buku','harga_buku')
                ->where('id_buku', $value_cart['id_item'])->first();
            // add new key and value
            $cart[$index_cart]["book_name"] = $book->nama_buku;
            $cart[$index_cart]["total"] = $book->harga_buku * $value_cart['qty'];

            // sum all item
            $total += $book->harga_buku * $value_cart['qty'];
        }

        // save books
        BooksMoney::insert([
            'NIS_siswa' => $request->nis_siswa,
            'tingkat' => strtoupper($request->tingkat),
            'kelas' => $request->kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'data_buku' => json_encode($cart),
            'total_harga_buku' => (string) $total,
            'status_buku' => 'belum_lunas',
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * @param object $request
     * @return void
     */
    public function buyConsumption(object $request)
    {
        // code consumption
        $inv_number = 'KSSI-' . Str::random(10) . date('yMd');

        ConsumptionMoney::insert([
            'kode_uang_konsumsi' => $inv_number,
            'NIS_siswa' => $request->nis_siswa,
            'tingkat' => strtoupper($request->tingkat),
            'kelas' => $request->kelas,
            'total_biaya' => $request->uang_konsumsi,
            'status_konsumsi' => 'belum_lunas',
            'created_at' => Carbon::now(),
        ]);
    }

    /**
     * @param array $id
     * @param array $data
     * @return array
     */
    protected function countBuyingItem($request,array $item_id, array $data): array
    {

        $result = [];
        $data = $this->deleteKey($data);
        // reset key
        $data = array_values($data);
        foreach($item_id as $index => $item)
        {
            $result[$item] = array(
                'id_item'  => $item,
                'qty' => $data[$index],
            );
        }
        return $result;
    }

    /** Optional Administration
     * buyClothes
     * buyBooks
     * buyConsumption
     */
    public function optionalAdministration(object $request): void
    {
        if( isset($request->baju_id) )
        {
            $this->buyClothes($request);
        }

        if( isset($request->buku_id) )
        {
            $this->buyBooks($request);
        }

        if( isset($request->uang_konsumsi) )
        {
            $this->buyConsumption($request);
        }
    }

    /**
     * delete key if index % 2 == 0
     * @param array $data
     * @return array
     */
    protected function deleteKey(array $data)
    {
        for ($i=0; $i <= count($data); $i++)
        {
            if( ($i % 2) == 0)
            {
                // remove key
                unset($data[$i]);
            }
        }
        return $data;
    }
}
