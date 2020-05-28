<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{

    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->decimal('preco', 8, 2);
            $table->text('descricao');
            $table->char('novidade', 1);
            $table->char('genero', 1);
            $table->char('ativo', 1);
            $table->string('imagem');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->integer('tamanho_id')->unsigned();
            $table->foreign('tamanho_id')->references('id')->on('tamanhos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
