<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->string('TransID');
            $table->string('TransTime');
            $table->string('TransAmount');
            $table->string('BusinessShortCode');
            $table->string('CheckOutId');
            $table->string('BillRefNumber');
            $table->string('InvoiceNumber');
            $table->string('OrgAccountBalance');
            $table->string('MechantId');
            $table->string('MSISDN');
            $table->string('FirstName');
            $table->string('Email');
            $table->string('LastName');
            $table->string('Status');
            $table->string('Used');
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
        Schema::dropIfExists('mpesa_transactions');
    }
}
