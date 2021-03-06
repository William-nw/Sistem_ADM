<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('no_hp',13)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->json('siswa_ortu')->nullable();
            $table->enum('status', ['orang_tua', 'tata_usaha', 'kepala_sekolah']);
            $table->boolean('changed_password')->default(false);
            $table->tinyInteger('isactive')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
