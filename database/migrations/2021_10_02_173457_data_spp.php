<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataSpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_spp', function (Blueprint $table) {
            $table->id('id_spp');
            $table->string('kode_spp', 50);
            $table->string('NIS_siswa',30);
            $table->enum('tingkat',['TK','SD','SMP'])->default(null);
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('tahun_ajaran');
            $table->double('total_spp', 10,2);
            $table->enum('status_spp', ['belum_lunas', 'tertunggak', 'lunas']);
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
        Schema::dropIfExists('data_spp');
    }
}
