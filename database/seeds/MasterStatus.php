<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_status_user')->insert([
            ['status' => 'tata_usaha', 'created_at' => Carbon::now() ],
            ['status' => 'kepala_sekolah', 'created_at' => Carbon::now()],
            ['status' => 'orangtua', 'created_at' => Carbon::now()],

        ]);
    }
}
