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
        Schema::create('bate_caixas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('instalacao');
            $table->string('medidor');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->string('observacao');
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
        Schema::dropIfExists('bate_caixas');
    }
};
