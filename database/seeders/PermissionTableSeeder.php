<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'lista-roles',
           'crear-roles',
           'editar-roles',
           'eliminar-roles',
           'lista-usuarios',
           'crear-usuarios',
           'editar-usuarios',
           'eliminar-usuarios',
           'lista-especialidad',
           'crear-especialidad',
           'editar-especialidad',
           'eliminar-especialidad',
           'asignar-especialidad-usuario',
           'lista-cita',
           'crear-cita',
           'editar-cita',
           'eliminar-cita',
           'lista-tratamiento',
           'crear-tratamiento',
           'editar-tratamiento',
           'eliminar-tratamiento',
           'configuracion-horario',
           'lista-curacion',
           'crear-curacion',
           'editar-curacion',
           'odontograma',
           'crear-odontograma',
           'editar-odontograma',
           'eliminar-odontograma'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
        //php artisan db:seed --class=PermissionTableSeeder
        //php artisan db:seed --class=CreateAdminUserSeeder
        //php artisan db:seed --class=DiasTableSeeder
        //php artisan db:seed --class=BloquesTableSeeder
        //php artisan db:seed --class=TratamientosTableSeeder
        //php artisan db:seed --class=BloqueDiaSeeder
    }
}
