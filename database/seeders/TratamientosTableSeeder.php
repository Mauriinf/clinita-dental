<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use Illuminate\Database\Seeder;

class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tratamiento::create([
            'descripcion' => 'Caries',
            'color' => '#008000',
            'estado' => 'ACTIVO',
            'costo' => 50
        ]);
        Tratamiento::create([
            'descripcion' => 'Implante',
            'color' => '#FFFF00',
            'estado' => 'ACTIVO',
            'costo' => 50
        ]);
        Tratamiento::create([
            'descripcion' => 'Corona',
            'color' => '#FF0000',
            'estado' => 'ACTIVO',
            'costo' => 70
        ]);
    }
}
