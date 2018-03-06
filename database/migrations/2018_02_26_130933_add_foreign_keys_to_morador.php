<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMorador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('morador', function(Blueprint $table)
		{
            $table->foreign('id_apartamento', 'fk_apartamento__morador')->references('id_apartamento')->on('apartamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_usuario', 'fk_usuario__morador')->references('id_usuario')->on('usuario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_morador_tipo', 'fk_morador_tipo__morador')->references('id_morador_tipo')->on('morador_tipo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('morador', function(Blueprint $table)
		{
            $table->dropForeign('fk_apartamento__morador');
            $table->dropForeign('fk_usuario__morador');
			$table->dropForeign('fk_morador_tipo__morador');
		});
    }
}
