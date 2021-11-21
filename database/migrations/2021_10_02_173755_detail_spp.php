<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailSpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_spp', function (Blueprint $table) {
            $table->id('id_detail_spp');
            $table->string('kode_spp', 50);
            $table->string('NIS_siswa',30);
            $table->tinyInteger('bulan');
            $table->integer('tertungak')->nullable();
            $table->double('denda_pembayaran', 10,2)->nullable();
            $table->double('total_spp', 10,2); // jika ada dendan total spp lama + denda;
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->enum('status_detail_spp', ['belum_lunas', 'tertunggak', 'lunas']);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('detail_spp');
    }
}
