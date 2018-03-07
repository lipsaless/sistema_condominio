<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('no_morador');
            $table->string('no_funcionario');
            $table->integer('nu_cpf_morador');
            $table->integer('nu_cpf_funcionario');
            $table->string('nu_rg_morador')->nullable();
            $table->string('nu_rg_funcionario')->nullable();
            $table->integer('nu_celular_morador')->nullable();
            $table->integer('nu_celular_funcionario')->nullable();
            $table->integer('nu_telefone_morador')->nullable();
            $table->integer('nu_telefone_funcionario')->nullable();
            $table->char('sg_sexo_morador')->nullable();
            $table->char('sg_sexo_funcionario')->nullable();
            $table->date('dt_nascimento_morador')->nullable();
            $table->date('dt_nascimento_funcionario')->nullable();
            $table->string('ds_email_morador')->nullable();
            $table->string('ds_email_funcionario')->nullable()->nullable();
            $table->string('ds_senha_morador')->nullable();
            $table->string('ds_senha_funcionario')->nullable();
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
        Schema::dropIfExists('usuario');
    }
}
