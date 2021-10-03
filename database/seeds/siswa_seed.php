<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class siswa_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'NIS_siswa' => '0000125',
            'nama_siswa' => 'YoYo',
            'kelas' => '1',
            'tahun_ajaran' => '1',
            'created_at' => Carbon::now(),
        ]);
    }
}
