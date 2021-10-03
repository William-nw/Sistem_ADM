<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPembayaranSpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembayaran_spp', function (Blueprint $table) {
            $table->id('id_detail_pembayaran_spp');
            $table->string('kode_spp', 50);
            $table->string('kode_pembayaran', 50);
            $table->string('NIS_siswa',30);
            $table->string('bulan', 30);
            $table->dateTime('tanggal_pembayaran');
            $table->double('total_bayar', 10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pembayaran_spp');
    }
}
