<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id_funcionario');
            $table->string('tipo_perfil');
            $table->string('no_funcionario');
            $table->string('nu_cpf_funcionario')->nullable();
            $table->string('nu_rg_funcionario');
            $table->string('nu_celular_funcionario')->nullable();
            $table->string('nu_telefone_funcionario')->nullable();
            $table->char('sg_sexo_funcionario',1)->nullable();
            $table->dateTime('dt_nascimento_funcionario')->nullable();
            $table->string('ds_email_funcionario')->nullable()->nullable();
            $table->string('ds_senha_funcionario')->nullable();
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
        Schema::dropIfExists('funcionario');
    }
}
