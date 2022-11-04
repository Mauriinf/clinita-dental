<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bloque;
class BloquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bloque::create([
            'inicio' => '08:00:00',
            'fin' => '08:30:00'
        ]);
        Bloque::create([
            'inicio' => '08:30:00',
            'fin' => '09:00:00'
        ]);
        Bloque::create([
            'inicio' => '09:00:00',
            'fin' => '09:30:00'
        ]);
        Bloque::create([
            'inicio' => '09:30:00',
            'fin' => '10:00:00'
        ]);
        Bloque::create([
            'inicio' => '10:00:00',
            'fin' => '10:30:00'
        ]);
        Bloque::create([
            'inicio' => '10:30:00',
            'fin' => '11:00:00'
        ]);
        Bloque::create([
            'inicio' => '11:00:00',
            'fin' => '11:30:00'
        ]);
        Bloque::create([
            'inicio' => '11:30:00',
            'fin' => '12:00:00'
        ]);
        Bloque::create([
            'inicio' => '12:00:00',
            'fin' => '12:30:00'
        ]);
        Bloque::create([
            'inicio' => '12:30:00',
            'fin' => '13:00:00'
        ]);
        Bloque::create([
            'inicio' => '13:00:00',
            'fin' => '13:30:00'
        ]);
        Bloque::create([
            'inicio' => '13:30:00',
            'fin' => '14:00:00'
        ]);
        Bloque::create([
            'inicio' => '14:00:00',
            'fin' => '14:30:00'
        ]);
        Bloque::create([
            'inicio' => '14:30:00',
            'fin' => '15:00:00'
        ]);
        Bloque::create([
            'inicio' => '15:00:00',
            'fin' => '15:30:00'
        ]);
        Bloque::create([
            'inicio' => '15:30:00',
            'fin' => '16:00:00'
        ]);
        Bloque::create([
            'inicio' => '16:00:00',
            'fin' => '16:30:00'
        ]);
        Bloque::create([
            'inicio' => '16:30:00',
            'fin' => '17:00:00'
        ]);
        Bloque::create([
            'inicio' => '17:00:00',
            'fin' => '17:30:00'
        ]);
        Bloque::create([
            'inicio' => '17:30:00',
            'fin' => '18:00:00'
        ]);
        Bloque::create([
            'inicio' => '18:00:00',
            'fin' => '18:30:00'
        ]);
        Bloque::create([
            'inicio' => '18:30:00',
            'fin' => '19:00:00'
        ]);
        Bloque::create([
            'inicio' => '19:00:00',
            'fin' => '19:30:00'
        ]);
        Bloque::create([
            'inicio' => '19:30:00',
            'fin' => '20:00:00'
        ]);
        Bloque::create([
            'inicio' => '20:00:00',
            'fin' => '20:30:00'
        ]);
        Bloque::create([
            'inicio' => '20:30:00',
            'fin' => '21:00:00'
        ]);
    }
}
