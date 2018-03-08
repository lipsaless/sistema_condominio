<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradorTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morador_tipo', function (Blueprint $table) {
            $table->increments('id_morador_tipo');
            $table->string('no_morador_tipo');
            $table->string('ref_morador_tipo');
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
        Schema::dropIfExists('morador_tipo');
    }
}
