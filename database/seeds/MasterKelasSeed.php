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
        MasterKelas::create([
            'nama_kelas' => '1A',
            'created_at' => Carbon::now(),
        ]);
    }
}
