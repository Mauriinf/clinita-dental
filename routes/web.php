<?php

use App\Http\Controllers\BloqueDiaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CuracionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReporteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::get('calendario', [App\Http\Controllers\HomeController::class, 'calendario'])->name('calen');
    Route::resource('roles', RoleController::class);
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::get('especialidades', [EspecialidadController::class,'index'])->name('espec.index');
    Route::post('list/especialidades', [EspecialidadController::class,'lista_especialidad'])->name('espec.list');
    //create update
	Route::post('/especialidades', [EspecialidadController::class,'store']);
    // estado
	Route::put('/especialidades/{especialidad}', [EspecialidadController::class,'estado'])->name('espec.update.estado');
    //delete
    Route::delete('/especialidades/{especialidad}', [EspecialidadController::class,'destroy']);
    Route::get('/especialidades/{id}/show',[EspecialidadController::class,'show']);
    Route::post('/especialidades/usuario/save',[EspecialidadController::class,'guardar_especialidad_usuario'])->name('espec.user.save');
    //CITAS
    Route::get('crear/cita', [CitaController::class,'create'])->name('citas.create');
    Route::get('/especialidades/{especialidad}/doctores', [UserController::class,'doctores'])->name('doctores.list');
    Route::get('/calendario/horas', [CitaController::class,'horas']);
    Route::post('/guardar/citas', [CitaController::class,'store']);
    Route::post('/editar/citas', [CitaController::class,'update']);
    Route::get('citas', [CitaController::class,'index'])->name('citas.index');
    Route::delete('/citas/{cita}', [CitaController::class,'destroy']);
    Route::get('/citas/{id}/show',[CitaController::class,'show']);
    Route::put('/cita/{citas}/estado', [CitaController::class,'estado'])->name('cita.update.estado');
    Route::get('/cita/{id}/update', [CitaController::class,'edit'])->name('cita.edit');
    //TRATAMIENTOS
    Route::get('tratamientos', [TratamientoController::class,'index'])->name('trata.index');
	Route::post('/tratamientos', [TratamientoController::class,'store']);
	Route::put('/tratamientos/{tratamiento}', [TratamientoController::class,'estado'])->name('trata.update.estado');
    Route::delete('/tratamientos/{tratamiento}', [TratamientoController::class,'destroy']);
    Route::get('/tratamientos/{id}/show',[TratamientoController::class,'show']);
    ///curaciones
    Route::get('consultas', [CuracionesController::class,'index'])->name('curaciones.index');
    Route::get('lista/consultas', [CuracionesController::class,'lista_consultas'])->name('lista.consultas');
    Route::get('nueva/consulta', [CuracionesController::class,'nuevo'])->name('nueva.consulta');
    //Odontograma
    Route::get('/nuevo/odontograma/{id}',[OdontogramaController::class,'odontograma'])->name('nuevo.odontograma');
    Route::get('/ver/odontograma/{id}',[OdontogramaController::class,'ver_odontograma'])->name('ver.odontograma');
    Route::get('/lista/odontograma',[OdontogramaController::class,'lista_odontograma'])->name('list.odontograma');
    Route::post('/actualizar/pago',[OdontogramaController::class,'actualizar_pago'])->name('actualizar.pago');;
    Route::post('/guardar/odontograma',[OdontogramaController::class,'guardar_odontograma']);
    Route::post('/eliminar/odontograma',[OdontogramaController::class,'eliminar_odontograma']);
    //CONFIG CALENDARIO
    Route::resource('/bloque-dia', BloqueDiaController::class);
    Route::get('/bloque-dia/config-agenda/{bdia}', [BloqueDiaController::class, 'config_agenda'])->name('config_agenda');
    Route::get('/generar-agenda', [BloqueDiaController::class, 'generar_agenda'])->name('generar_agenda');
    // curaciones
    Route::get('/curaciones/buscar-paciente/{ci}', [CuracionesController::class, 'buscar_paciente'])->name('buscar_paciente');
    Route::post('/curaciones/guardar-consulta', [CuracionesController::class, 'guardar_consulta'])->name('guardar_consulta');
    Route::post('/curaciones/editar-consulta', [CuracionesController::class, 'editar_consulta'])->name('editar_consulta');
    // mi perfil
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::put('/perfil', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');
    Route::get('/password', [PerfilController::class, 'password'])->name('password');
    Route::put('/password', [PerfilController::class, 'password_actualizar'])->name('password.actualizar');
    // reportes
    Route::get('/historia-clinica/{id}', [ReporteController::class, 'historia_clinica'])->name('reporte.historia_clinica');
    Route::get('/reporte/fecha', [ReporteController::class, 'reporte_fechas'])->name('reporte.entre.fechas');
    Route::get('/reporte/pacientes', [ReporteController::class, 'reporte_pacientes'])->name('reporte.pacientes');
    Route::get('/reporte/consulta/cobros/{id}', [ReporteController::class, 'consulta_cobros'])->name('reporte.consulta.cobros');
});
