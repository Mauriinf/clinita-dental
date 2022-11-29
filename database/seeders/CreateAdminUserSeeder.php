<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'mnina',
            'email' => 'dnina826@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'direccion' => '',
            'telefono' => '',
            'ci' => '8537800',
            'nombres' => 'MAURICIO',
            'paterno' => 'NINA',
            'materno' => 'CANAVIRI',
            'fec_nac' => '1995-01-01',
            'estado' => '1',
            'sexo' => 'M'
        ]);
        $role = Role::create(['name' => 'Paciente']);
        $role = Role::create(['name' => 'Doctor']);
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
