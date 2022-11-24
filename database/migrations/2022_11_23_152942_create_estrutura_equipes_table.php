<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('estrutura_equipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('fiscal_id')->unsigned();
            $table->foreign('fiscal_id')->references('id')->on('estrutura_fiscals');
            $table->integer('supervisor_id')->unsigned();
            $table->foreign('supervisor_id')->references('id')->on('estrutura_supervisors');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('regional');
            $table->string('status');

        });
    }


    public function down()
    {
        Schema::dropIfExists('estrutura_equipes');
    }
};
