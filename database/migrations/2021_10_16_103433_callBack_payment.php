<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CallBackPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callback_pembayaran', function (Blueprint $table) {
            $table->id('id_callback_pembayaran');
            $table->string('owner_id')->nullable();
            $table->string('external_id')->nullable()->references('external_id')->on('master_bank_account');
            $table->string('callback_virtual_account_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('account_number')->nullable();
            $table->double('jumlah_pembayaran',10,2); // jumlah yang harus di bayar
            $table->dateTime('tanggal_pembayaran');
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
        Schema::dropIfExists('invoice_payment');
    }
}
