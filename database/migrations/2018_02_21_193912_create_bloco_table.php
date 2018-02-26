<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloco', function (Blueprint $table) {
            $table->increments('id_bloco');
            $table->integer('id_condominio');
            $table->string('no_bloco');
            $table->dateTime('dt_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));;
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
        Schema::dropIfExists('bloco');
    }
}
