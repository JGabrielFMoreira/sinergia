<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtividade_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->string('instalacao');
            $table->date('data_execucao');
            $table->integer('codigo_id')->unsigned();
            $table->foreign('codigo_id')->references('id')->on('codigos');
            $table->integer('tipo_servico_id')->unsigned();
            $table->foreign('tipo_servico_id')->references('id')->on('tipo_servicos');
            $table->decimal('valor_ups');
            $table->string('medidor_instalado');
            $table->string('tipo_ramal');
            $table->decimal('quantidade_aplicada');
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
        Schema::dropIfExists('produtividade_servicos');
    }
};
