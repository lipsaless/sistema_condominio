<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitante', function (Blueprint $table) {
            $table->increments('id_visitante');
            $table->integer('id_visitante_tipo');
            $table->integer('id_morador');
            $table->string('no_visitante');
            $table->string('nu_cpf')->nullable();
            $table->string('nu_rg');
            $table->string('nu_telefone')->nullable();
            $table->string('nu_celular')->nullable();
            $table->string('ds_email')->nullable();
            $table->dateTime('dt_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dt_fim')->nullable();
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
        Schema::dropIfExists('visitante');
    }
}
