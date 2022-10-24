<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloqueSeeder extends Seeder
{
    public function run()
    {
        $hora_inicio = '07:00';
        $intervalo = '15';

        $seg_hora_inicio = strtotime($hora_inicio);
        $seg_intervalo = $intervalo * 60;
        for($i = 0; $i < 50; $i++){
            DB::table('bloque')->insert([
                'inicio' => date('H:i', $seg_hora_inicio),
                'fin' => date('H:i', $seg_hora_inicio + $seg_intervalo),
            ]);
            $seg_hora_inicio = $seg_hora_inicio + $seg_intervalo;
        }
    }
}
