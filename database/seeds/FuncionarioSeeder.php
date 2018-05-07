<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

         // Array que será inserido no banco
        $data = array();
            // Criar 4 moradores para cada apartamento
            foreach (range(1, 70) as $i) {
                $data[] = [
                    'no_funcionario' => $faker->name,
                    'nu_cpf_funcionario' => $faker->cpf(false),
                    'nu_rg_funcionario' => $faker->rg(false),
                    'nu_telefone_funcionario' => $faker->landline(false),
                    'nu_celular_funcionario' => $faker->cellphone(false),
                    'ds_email_funcionario' => $faker->safeEmail,
                    'ds_senha_funcionario' => md5($faker->password),
                    'dt_nascimento_funcionario' => $faker->date,
                ];
            }

        DB::table('funcionario')->insert($data);
    }
}
