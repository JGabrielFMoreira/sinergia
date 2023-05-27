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
        Schema::create('codigos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('descricao');
            $table->string('codigo');
            $table->decimal('ups_alvo_mono');
            $table->decimal('ups_alvo_bi_tri');
            $table->decimal('ups_voluntario_mono');
            $table->decimal('ups_voluntario_bi_tri');

        });
    }


    public function down()
    {
        Schema::dropIfExists('codigos');
    }
};
