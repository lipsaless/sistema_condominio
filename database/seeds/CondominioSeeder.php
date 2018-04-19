<?php

use Illuminate\Database\Seeder;

class CondominioSeeder extends Seeder
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
                'no_condominio' => 'Condomínio 4Amigos'
            ]
        ];

        DB::table('condominio')->insert($params);
    }
}
