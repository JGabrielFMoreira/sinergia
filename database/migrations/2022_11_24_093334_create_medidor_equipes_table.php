<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('medidor_equipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medidor_entrega_id')->unsigned();
            $table->foreign('medidor_entrega_id')->references('id')->on('medidor_entregas');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->string('numero');
            $table->string('tipo');
            $table->string('status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('medidor_equipes');
    }
};
