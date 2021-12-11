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
        $this->call(MasterKelasSeed::class);
        $this->call(MasterTahunAjaranSeeder::class);
        $this->call(MasterBajuSeeder::class);
        $this->call(MasterBukuSeeder::class);
        $this->call(UserSeeder::class);
    }
}
