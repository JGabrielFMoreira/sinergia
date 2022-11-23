<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('estrutura_supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('regional');
            $table->string('status');
        });
    }


    public function down()
    {
        Schema::dropIfExists('estrutura_supervisors');
    }
};
