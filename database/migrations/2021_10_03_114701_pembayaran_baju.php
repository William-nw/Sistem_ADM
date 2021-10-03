<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembayaranBaju extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_baju', function (Blueprint $table) {
            $table->id('id_pembayaran_baju');
            $table->string('kode_pembayaran_baju', 50);
            $table->unsignedBigInteger('id_uang_baju');
            $table->string('NIS_siswa',30);
            $table->dateTime('tanggal_pembayaran');
            $table->double('total_pembayaran_baju', 10,2);
            $table->timestamps();

            $table->foreign('id_uang_baju')->references('id_uang_baju')->on('uang_baju');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pembayaran_baju');
    }
}
