<?php

use App\Models\AkunBank;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AkunBank::insert([
            [
                'bank_id' => "6159aac14a154229302d2379",
                'external_id' => "va-1475804036622",
                'owner_id' => "613dbfb4ce1a2f1136f37415",
                'merchant_code' => "8808",
                'bank_code' => "BNI",
                'account_number' => "8808999984419696",
                'name' => "XDT-Michael Chen",
                'type_account'=> "Virtual Account",
                'status_bank' => "ACTIVE",
                'expiration_date' => "2052-10-03",
                'created_at' => Carbon::now(),
            ],[
                'bank_id' => "616ae46554f8fd493e029a4d",
                'external_id' => "va-1634395234",
                'owner_id' => "613dbfb4ce1a2f1136f37415",
                'merchant_code' => "10766",
                'bank_code' => "BCA",
                'account_number' => "107669999119593",
                'name' => "Tu1",
                'type_account'=> "Virtual Account",
                'status_bank' => "ACTIVE",
                'expiration_date' => "2052-10-16",
                'created_at' => Carbon::now(),
            ],[
                'bank_id' => "616ae4e954f8fdc8c5029a4e",
                'external_id' => "va-1634395366",
                'owner_id' => "613dbfb4ce1a2f1136f37415",
                'merchant_code' => "10766",
                'bank_code' => "BCA",
                'account_number' => "107669999995672",
                'name' => "test 1",
                'type_account'=> "Virtual Account",
                'status_bank' => "ACTIVE",
                'expiration_date' => "2052-10-16",
                'created_at' => Carbon::now(),
            ],[
                'bank_id' => "616ae6ab54f8fd0f77029a4f",
                'external_id' => "va-1634395817",
                'owner_id' => "613dbfb4ce1a2f1136f37415",
                'merchant_code' => "10766",
                'bank_code' => "BCA",
                'account_number' => "107669999931380",
                'name' => "Keuangan Siswa 1",
                'type_account'=> "Virtual Account",
                'status_bank' => "ACTIVE",
                'expiration_date' => "2052-10-16",
                'created_at' => Carbon::now(),
            ],
        ]);
    }

}
