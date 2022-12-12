<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidad::create([
            'nombre' => 'Obturación Estetica',
            'descripcion' => '',
            'estado' => '1'
        ]);
        Especialidad::create([
            'nombre' => 'Tratamiento de Conducto',
            'descripcion' => '',
            'estado' => '1'
        ]);
        Especialidad::create([
            'nombre' => 'Ortodencia(Brakets)',
            'descripcion' => '',
            'estado' => '1'
        ]);
        Especialidad::create([
            'nombre' => 'Odontopediatria',
            'descripcion' => '',
            'estado' => '1'
        ]);
    }
}
