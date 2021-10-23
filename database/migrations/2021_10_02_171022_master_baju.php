<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterBaju extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_baju', function (Blueprint $table) {
            $table->id('id_baju');
            $table->string('nama_baju');
            $table->string('ukuran_baju');
            $table->unsignedBigInteger('kelas');
            $table->double('harga_baju', 10,2);
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
        Schema::dropIfExists('master_baju');
    }
}
