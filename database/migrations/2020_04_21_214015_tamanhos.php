<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tamanhos extends Migration
{
    
    public function up()
    {
        Schema::create('tamanhos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tamanhos');
    }
}