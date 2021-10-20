<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterBankAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_bank_account', function (Blueprint $table) {
            $table->id('id_bank_account');
            $table->string('bank_id')->unique();
            $table->string('external_id');
            $table->string('owner_id');
            $table->string('merchant_code');
            $table->string('bank_code');
            $table->string('account_number')->unique();
            $table->string('name');
            $table->string('type_account',30);
            $table->string('status_bank');
            $table->date('expiration_date');
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
        Schema::dropIfExists('bank_account');
    }
}
