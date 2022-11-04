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
            'costo' => 50
        ]);
        Tratamiento::create([
            'descripcion' => 'Implante',
            'costo' => 50
        ]);
        Tratamiento::create([
            'descripcion' => 'Corona',
            'costo' => 70
        ]);
    }
}
