<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Siswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('NIS_siswa',30);
            $table->string('nama_siswa',70);
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('tahun_ajaran');
            $table->timestamps();

            $table->foreign('kelas')->references('id')->on('master_kelas');
            $table->foreign('tahun_ajaran')->references('id')->on('master_tahun_ajaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
