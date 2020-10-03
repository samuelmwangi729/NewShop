<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancelledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelleds', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->string('OrderId');
            $table->string('MechantId');
            $table->string('CheckOutRequestId');
            $table->string('MSISDN');
            $table->string('FirstName');
            $table->string('Email');
            $table->string('LastName');
            $table->string('Status')->default('Cancelled');
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
        Schema::dropIfExists('cancelleds');
    }
}
