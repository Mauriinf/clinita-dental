<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dia;
class DiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create([
            'nombre_dia' => 'Lunes',
            'estado' => 'ACTIVO'
        ]);
        Dia::create([
            'nombre_dia' => 'Martes',
            'estado' => 'ACTIVO'
        ]);
        Dia::create([
            'nombre_dia' => 'Miercoles',
            'estado' => 'ACTIVO'
        ]);
        Dia::create([
            'nombre_dia' => 'Jueves',
            'estado' => 'ACTIVO'
        ]);
        Dia::create([
            'nombre_dia' => 'Viernes',
            'estado' => 'ACTIVO'
        ]);
        Dia::create([
            'nombre_dia' => 'Sabado',
            'estado' => 'ACTIVO'
        ]);
        Dia::create([
            'nombre_dia' => 'Domingo',
            'estado' => 'ACTIVO'
        ]);
    }
}
