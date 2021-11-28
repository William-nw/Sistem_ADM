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
        MasterTahunAjaran::insert([
            [
                'nama_tahun_ajaran' => '2018/2019',
                'created_at' => Carbon::now(),
            ],
            [
                'nama_tahun_ajaran' => '2019/2020',
                'created_at' => Carbon::now(),
            ],
            [
                'nama_tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now(),
            ],
            [
                'nama_tahun_ajaran' => '2022/2023',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
