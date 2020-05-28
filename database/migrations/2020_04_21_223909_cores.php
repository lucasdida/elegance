<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cores extends Migration
{
    public function up()
    {
        Schema::create('cores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cores');
    }
}
