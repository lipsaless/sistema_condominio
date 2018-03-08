<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartamento', function (Blueprint $table) {
            $table->increments('id_apartamento');
            $table->integer('id_bloco');
            $table->string('no_apartamento');
            $table->dateTime('dt_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));;
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
        Schema::dropIfExists('apartamento');
    }
}
