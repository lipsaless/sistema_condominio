<?php

use Illuminate\Database\Seeder;

class MoradorTipoSeeder extends Seeder
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
                'no_morador_tipo' => 'Normal',
                'ref_morador_tipo' => 'normal'
            ],
            [
                'no_morador_tipo' => 'Proprietário',
                'ref_morador_tipo' => 'proprietario'
            ],
            [
                'no_morador_tipo' => 'Inquilino',
                'ref_morador_tipo' => 'inquilino'
            ]
        ];

        DB::table('morador_tipo')->insert($params);
    }
}
