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
            'estado' => 'ACTIVO',
            'costo' => 50
        ]);
        Tratamiento::create([
            'descripcion' => 'Implante',
            'estado' => 'ACTIVO',
            'costo' => 50
        ]);
        Tratamiento::create([
            'descripcion' => 'Corona',
            'estado' => 'ACTIVO',
            'costo' => 70
        ]);
    }
}
