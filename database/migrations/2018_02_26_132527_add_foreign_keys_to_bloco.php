<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToBloco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bloco', function(Blueprint $table)
		{
            $table->foreign('id_condominio', 'fk_condominio__bloco')->references('id_condominio')->on('condominio')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bloco', function(Blueprint $table)
		{
            $table->dropForeign('fk_condominio__bloco');
		});
    }
}
