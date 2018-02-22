<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morador', function (Blueprint $table) {
            $table->integer('id_morador');
            $table->integer('id_usuario');
            $table->integer('id_apartamento');
            $table->integer('id_morador_tipo');
            $table->dateTime('dt_inicio');
            $table->dateTime('dt_fim');
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
        Schema::dropIfExists('morador');
    }
}
