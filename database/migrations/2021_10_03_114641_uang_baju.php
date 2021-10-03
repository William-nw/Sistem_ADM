<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UangBaju extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_baju', function (Blueprint $table) {
            $table->id('id_uang_baju');
            $table->string('NIS_siswa',30);
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('tahun_ajaran');
            $table->json('data_baju')->nullable();
            $table->double('total_harga_baju', 10,2);
            $table->enum('status_baju', ['belum_lunas', 'tertunggak', 'lunas']);
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
        Schema::dropIfExists('pembayaran_baju');
    }
}
