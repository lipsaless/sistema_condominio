<?php

use Illuminate\Database\Seeder;

class VisitanteTipoSeeder extends Seeder
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
                'no_visitante_tipo' => 'Normal',
                'ref_visitante_tipo' => 'normal'
            ]
        ];

        DB::table('visitante_tipo')->insert($params);
    }
}
