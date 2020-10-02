<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('ShopNumber');
            $table->string('ShopName');
            $table->string('ShopLogo');
            $table->string('ShopPin');
            $table->string('ShopAddress');
            $table->string('ShopCounty');
            $table->string('ShopTown');
            $table->string('ShopPhoneNumber');
            $table->string('ShopAcceptable');
            $table->string('ShopMpesa');
            $table->string('ShopBank');
            $table->string('ShopBankAccount');
            $table->string('ShopOwner');
            $table->string('ShopStatus')->default(0);
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
        Schema::dropIfExists('shops');
    }
}
