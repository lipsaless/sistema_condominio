<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario', function(Blueprint $table)
		{
            $table->foreign('id_usuario', 'fk_usuarios__funcionario')->references('id_usuario')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario', function(Blueprint $table)
		{
            $table->dropForeign('fk_usuarios__funcionario');
		});
    }
}
