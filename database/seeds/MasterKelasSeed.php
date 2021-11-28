<?php

use App\Models\MasterKelas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterKelasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterKelas::insert([
            [
                'nama_kelas' => '1A',
                'created_at' => Carbon::now()
            ],
            [
                'nama_kelas' => '1B',
                'created_at' => Carbon::now()
            ],
            [
                'nama_kelas' => '1C',
                'created_at' => Carbon::now()
            ],   [
                'nama_kelas' => '2A',
                'created_at' => Carbon::now()
            ],
            [
                'nama_kelas' => '2B',
                'created_at' => Carbon::now()
            ],
            [
                'nama_kelas' => '2C',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
