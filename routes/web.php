<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EspecialidadController;
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
});