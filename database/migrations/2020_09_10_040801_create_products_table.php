<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->longText('ProductName');
            $table->longText('Slug');
            $table->string('ProductBrand');
            $table->string('ProductCategory');
            $table->string('ProductSubCategory');
            $table->string('ProductBanner');
            $table->string('FrontImage');
            $table->string('SideImage');
            $table->string('BackImage');
            $table->string('Price');
            $table->string('Discount');
            $table->string('FinalPrice');
            $table->string('SKU');
            $table->string('Qty');
            $table->longText('Description');
            $table->string('Status')->default(0);
            $table->string('Out')->default(0);
            $table->string('HasCoupon')->default(0);
            $table->string('Collection');
            $table->string('Tags')->nullable();
            $table->string('Shop')->nullable();
            $table->string('AddedBy');
            $table->string('Views')->default(0);
            $table->string('Purchases')->default(0);
            $table->string('ApprovedBy')->default(0);
            $table->string('EditedBy')->default(0);
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
        Schema::dropIfExists('products');
    }
}
