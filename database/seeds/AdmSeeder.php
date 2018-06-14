<?php

use Illuminate\Database\Seeder;

class AdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'no_funcionario' => 'Administrador',
                'nu_cpf_funcionario' => '12345678910',
                'nu_rg_funcionario' => '12345678910',
                'ds_email_funcionario' => 'adm@adm.com',
                'ds_senha_funcionario' => md5('administrador')
            ]
        ];

        DB::table('funcionario')->insert($params);
    }
}
