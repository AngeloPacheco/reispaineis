<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',80);
            $table->integer('qtde');
            $table->decimal('custo',8,2);
            $table->decimal('lucro',8,2);
            $table->decimal('venda',8,2);
            $table->string('dimensoes',20)->nulllable();
            $table->string('cor',20);
            $table->char('ativo',2);
            $table->char('novidade',2);
            $table->string('informacoes',80)->nulllable();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria_moveis');
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
        Schema::dropIfExists('moveis');
    }
}
