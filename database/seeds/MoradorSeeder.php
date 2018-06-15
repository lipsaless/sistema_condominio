<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MoradorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');
        
        $apartamentos = DB::table('apartamento')->get();

        $sexo = ['M', 'F'];

         // Array que será inserido no banco
        $data = array();

        // Realizar inserções para cada apartamento cadastrado no banco
        foreach ($apartamentos as $a) {
            // Criar 4 moradores para cada apartamento
            foreach (range(1, 4) as $i) {
                $data[] = [
                    'id_apartamento' => $a->id_apartamento,
                    'no_morador' => $faker->name,
                    'id_morador_tipo' => rand(1, 3),
                    'nu_cpf_morador' => $faker->cpf(false),
                    'nu_rg_morador' => $faker->rg(false),
                    'nu_telefone_morador' => '61'.$faker->landline(false),
                    'nu_celular_morador' => '61'.$faker->cellphone(false),
                    'sg_sexo_morador' => $sexo[rand(0,1)],
                    'ds_email_morador' => $faker->safeEmail,
                    'ds_senha_morador' => md5($faker->password),
                    'dt_nascimento_morador' => $faker->date,
                ];
            }
        }

        DB::table('morador')->insert($data);
    }
}
