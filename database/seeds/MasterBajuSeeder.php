<?php

use Illuminate\Database\Seeder;

use App\Models\MasterBaju;
use Carbon\Carbon;

class MasterBajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterBaju::insert([
            [
                'nama_baju' => 'Merah Putih',
                'ukuran_baju' => 'XL',
                'kelas' => 1,
                'harga_baju' => 75000,
                'created_at' => Carbon::now(),
            ],
            [
                'nama_baju' => 'Batik',
                'ukuran_baju' => 'M',
                'kelas' => 1,
                'harga_baju' => 95000,
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
