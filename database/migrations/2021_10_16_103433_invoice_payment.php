<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoicePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pembayaran', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->string('owner_id')->nullable();
            $table->string('external_id')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('account_number')->nullable();
            $table->string('name')->nullable();
            $table->double('jumlah_pembayaran',10,2); // jumlah yang harus di bayar
            $table->json('keterangan_internal')->nullable();
            $table->string('status_invoice', 20);
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
