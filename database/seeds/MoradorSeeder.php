<?php

use Illuminate\Database\Seeder;

class MoradorSeeder extends Seeder
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
            'no_morador' => 'felipe',
            'ds_email' => 'filipesales@gmail.com'
            ]
        ];

        DB::table('usuarios')->insert($params);
    }
}
