<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('no_morador');
            $table->string('no_funcionario');
            $table->integer('nu_cpf_morador');
            $table->integer('nu_cpf_funcionario');
            $table->string('nu_rg_morador');
            $table->string('nu_rg_funcionario');
            $table->integer('nu_celular_morador');
            $table->integer('nu_celular_funcionario');
            $table->integer('nu_telefone_morador');
            $table->integer('nu_telefone_funcionario');
            $table->char('sg_sexo_morador');
            $table->char('sg_sexo_funcionario');
            $table->string('ds_email_morador');
            $table->string('ds_email_funcionario');
            $table->dateTime('dt_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('usuarios');
    }
}
