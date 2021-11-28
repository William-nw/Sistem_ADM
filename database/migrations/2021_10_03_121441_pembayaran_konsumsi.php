<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembayaranKonsumsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_konsumsi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_uang_konsumsi');
            $table->string('NIS_siswa',30);
            $table->string('kode_pembayaran', 50);
            $table->dateTime('tanggal_bayar');
            $table->double('total_pembayaran', 10,2);
            $table->mediumText('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_uang_konsumsi')->references('id_uang_konsumsi')->on('uang_konsumsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_konsumsi');
    }
}
