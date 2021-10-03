<?php

use App\Models\Master_Kelas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class master_kelas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Master_Kelas::create([
            'nama_kelas' => '1A',
            'created_at' => Carbon::now(),
        ]);
    }
}
