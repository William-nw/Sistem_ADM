<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('nama_buku');
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('tahun_ajaran');
            $table->double('harga_buku', 10,2);
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
        Schema::dropIfExists('master_buku');
    }
}
