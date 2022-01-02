<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associados', function (Blueprint $table) {
            $table->id();
            $table->integer('local');
            $table->integer('setor');
            $table->bigInteger('cpf');
            //$table->integer('conselho');
            $table->string('nome');
            $table->integer('funcao');
            $table->integer('especialidade');
            $table->bigInteger('telefone');
            $table->string('email');
            $table->string('banco');
            $table->string('numero_agencia');
            $table->string('numero_conta');
            $table->string('tipo_de_conta');
            $table->string('chave_pix');
            //$table->longText('observacoes');
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
        Schema::dropIfExists('associados');
    }
}
