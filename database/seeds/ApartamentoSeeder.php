<?php

use Illuminate\Database\Seeder;

class ApartamentoSeeder extends Seeder
{
    public function run()
    {
        $blocos = DB::table('bloco')->get();
        $data = array();

        foreach ($blocos as $b) {
            foreach (range(1, 14) as $numeroAndar) {
                $numeroAndar .= '0';

                foreach (range(1, 4) as $numeroApartamento) {
                    $data[] = [
                        'id_bloco' => $b->id_bloco,
                        'no_apartamento' => $numeroAndar . $numeroApartamento . $b->no_bloco
                    ];
                }
            }
        }

        foreach ($data as $d) {
            DB::table('apartamento')->insert($d);
        }
    }
}
