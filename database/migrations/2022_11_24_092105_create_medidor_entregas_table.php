<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up()
    {
        Schema::create('medidor_entregas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->integer('medidores_recebidos');
            $table->string('tipo_medidor');
            $table->date('data_entrega');   
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('medidor_entregas');
    }
};
