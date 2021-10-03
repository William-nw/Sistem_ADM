<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UangKonsumsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_konsumi', function (Blueprint $table) {
            $table->id('id_uang_konsumsi');
            $table->string('kode_uang_konsumsi', 50);
            $table->string('NIS_siswa',30);
            $table->unsignedBigInteger('kelas');
            $table->double('total_biaya', 10,2);
            $table->enum('status_konsumsi', ['belum_lunas', 'tertunggak', 'lunas']);
            $table->timestamps();

            $table->foreign('kelas')->references('id')->on('master_kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uang_konsumi');
    }
}
