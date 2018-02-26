<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToApartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartamento', function(Blueprint $table)
		{
            $table->foreign('id_bloco', 'fk_bloco__apartamento')->references('id_bloco')->on('bloco')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartamento', function(Blueprint $table)
		{
            $table->dropForeign('fk_bloco__apartamento');
		});
    }
}
