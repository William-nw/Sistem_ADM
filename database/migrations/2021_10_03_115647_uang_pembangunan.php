<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UangPembangunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_pembangunan', function (Blueprint $table) {
            $table->id('id_uang_pembangunan');
            $table->string('NIS_siswa',30);
            $table->string('kode_pembangunan', 50);
            $table->unsignedBigInteger('kelas');
            $table->unsignedBigInteger('tahun_ajaran');
            $table->mediumText('keterangan_angsuran')->nullable();
            $table->double('total_biaya',10,2);
            $table->enum('status_pembangunan', ['belum_lunas', 'tertunggak', 'lunas']);
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
        Schema::dropIfExists('uang_pembangunan');
    }
}
