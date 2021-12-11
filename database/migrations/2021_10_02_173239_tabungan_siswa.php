<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabunganSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabungan_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('NIS_siswa',30);
            $table->string('external_id')->references('external_id')->on('master_bank_account');
            $table->double('total_tabungan', 10,2)->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabungan_siswa');
    }
}
