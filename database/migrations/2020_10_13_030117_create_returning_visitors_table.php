<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturningVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returning_visitors', function (Blueprint $table) {
            $table->id();
            $table->String('VisitorId');
            $table->String('VisitorIp');
            $table->String('DateVisited');
            $table->String('VisitorEmail');
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
        Schema::dropIfExists('returning_visitors');
    }
}
