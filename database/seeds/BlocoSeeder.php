<?php

use Illuminate\Database\Seeder;

class BlocoSeeder extends Seeder
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
                'id_condominio' => 1,
                'no_bloco' => 'A'
            ],
            [
                'id_condominio' => 1,
                'no_bloco' => 'B'
            ],
            [
                'id_condominio' => 1,
                'no_bloco' => 'C'
            ]
        ];

        DB::table('bloco')->insert($params);
    }
}
