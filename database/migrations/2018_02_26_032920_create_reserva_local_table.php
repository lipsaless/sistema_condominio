<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_local', function (Blueprint $table) {
            $table->increments('id_reserva_local');
            $table->string('no_reserva_local');
            $table->string('ref_reserva_local');
            $table->decimal('vl_reserva_local');
            $table->integer('nu_convidados');
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
        Schema::dropIfExists('reserva_local');
    }
}
