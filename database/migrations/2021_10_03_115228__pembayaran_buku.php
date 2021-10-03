<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembayaranBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_buku', function (Blueprint $table) {
            $table->id('id_pembayaran_buku');
            $table->string('kode_pembayaran_buku', 50);
            $table->unsignedBigInteger('id_uang_buku');
            $table->string('NIS_siswa',30);
            $table->dateTime('tanggal_pembayaran');
            $table->double('total_pembayaran_buku', 10,2);
            $table->timestamps();

            $table->foreign('id_uang_buku')->references('id_uang_buku')->on('uang_buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pembayaran_buku');
    }
}
