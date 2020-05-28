<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoresProdutos extends Migration
{
    
    public function up()
    {
        Schema::create('cores_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cor_id')->unsigned();
            $table->foreign('cor_id')->references('id')->on('cores');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('cores_produtos');
    }
}
