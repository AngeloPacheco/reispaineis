<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',80);
            $table->char('tipo_pessoa',2);
            $table->string('cpf_cnj',45);
            $table->string('rg_ie',80)->nulllable();
            $table->string('cep',45);
            $table->string('logradouro',45);
            $table->string('numero',10);
            $table->string('complemento',10);
            $table->string('bairro',45);
            $table->string('localidade',45);
            $table->string('uf',45);
            $table->string('fone_res',25);
            $table->string('fone_com',25);
            $table->string('celular',25);
            $table->string('email',80);
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
        Schema::dropIfExists('clientes');
    }
}
