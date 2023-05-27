<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_material');
            $table->string('descricao_material');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('materials');
    }
};
