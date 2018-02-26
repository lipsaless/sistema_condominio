<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToAnimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animal', function(Blueprint $table)
		{
            $table->foreign('id_morador', 'fk_morador__animal')->references('id_morador')->on('morador')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_animal_tipo', 'fk_animal_tipo__animal')->references('id_animal_tipo')->on('animal_tipo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal', function(Blueprint $table)
		{
            $table->dropForeign('fk_morador__animal');
            $table->dropForeign('fk_animal_tipo__animal');
		});
    }
}
