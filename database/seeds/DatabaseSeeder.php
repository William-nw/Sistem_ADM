<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(master_kelas_seed::class);
        $this->call(master_tahun_ajaran_seed::class);
        $this->call(siswa_seed::class);
    }
}
