<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\MasterBuku;

class MasterBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterBuku::insert([
            [
                'nama_buku' => 'Matematika',
                'kelas' => 1,
                'tahun_ajaran' => 1,
                'harga_buku' => 50000,
                'created_at' => Carbon::now()
            ],
            [
                'nama_buku' => 'Bahasa Indonesia',
                'kelas' => 1,
                'tahun_ajaran' => 1,
                'harga_buku' => 75000,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
