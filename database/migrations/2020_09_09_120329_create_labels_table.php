<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration {
    public function up () {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('Label');
            $table->string('Status')->default(0);
            $table->timestamps();
        });
    }
    public function down () {
        Schema::dropIfExists('labels');
    }
}
