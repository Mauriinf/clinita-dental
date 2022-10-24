<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloqueDiaSeeder extends Seeder
{
    public function run()
    {
        $dias = DB::table('dia')->get();

        $bloques = DB::table('bloque')->get();

        foreach($dias as $dia)
        {
            foreach($bloques as $bloque){
                DB::table('bloque_dia')->insert([
                    'id_usuario' => '1',
                    'estado' => 'activo',
                    'id_dia' => $dia->id,
                    'id_bloque' => $bloque->id,
                ]);
            }
        }
    }
}
