<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morador', function (Blueprint $table) {
            $table->increments('id_morador');
            $table->integer('id_apartamento');
            $table->integer('id_morador_tipo');
            $table->string('no_morador',255);
            $table->string('nu_cpf_morador',11);
            $table->string('nu_rg_morador',7);
            $table->string('nu_celular_morador',11)->nullable();
            $table->string('nu_telefone_morador',10)->nullable();
            $table->char('sg_sexo_morador');
            $table->date('dt_nascimento_morador');
            $table->string('ds_email_morador')->nullable();
            $table->string('ds_senha_morador')->nullable();
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
        Schema::dropIfExists('morador');
    }
}
