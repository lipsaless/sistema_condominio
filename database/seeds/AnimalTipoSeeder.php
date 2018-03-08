<?php

use Illuminate\Database\Seeder;

class AnimalTipoSeeder extends Seeder
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
                'no_animal_tipo' => 'Cachorro',
                'ref_animal_tipo' => 'cachorro'
            ],
            [
                'no_animal_tipo' => 'Gato',
                'ref_animal_tipo' => 'gato'
            ]
        ];

        DB::table('animal_tipo')->insert($params);
    }
}
