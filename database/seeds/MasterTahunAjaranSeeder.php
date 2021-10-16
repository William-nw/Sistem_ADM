<?php

use App\Models\MasterTahunAjaran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MasterTahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterTahunAjaran::create([
            'nama_tahun_ajaran' => '2021/2022',
            'created_at' => Carbon::now(),
        ]);
    }
}
