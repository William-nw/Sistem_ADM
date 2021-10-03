<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembayaranUangPembangunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_uang_pembangunan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_uang_pembangunan');
            $table->string('NIS_siswa',30);
            $table->string('kode_pembayaran', 50);
            $table->dateTime('tanggal_bayar');
            $table->double('total_pembayaran', 10,2);
            $table->mediumText('keterangan_angsuran')->nullable();
            $table->timestamps();

            $table->foreign('id_uang_pembangunan')->references('id_uang_pembangunan')->on('uang_pembangunan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_uang_pembangunan');
    }
}
