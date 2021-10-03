<?php

use App\Models\Master_tahun_ajaran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class master_tahun_ajaran_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Master_tahun_ajaran::create([
            'nama_tahun_ajaran' => '2021/2022',
            'created_at' => Carbon::now(),
        ]);
    }
}
