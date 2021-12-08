<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

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
    return view('principal');
});

/* GRADOS */

//index
Route::get('grados_index',  [GradoController::class, 'index'])->name('grados.index');
//create
Route::get('grados_create',  [GradoController::class, 'create'])->name('grados.create');
//store
Route::post('grados_store', [GradoController::class, 'store'])->name('grados.store');
//edit
Route::get('grados_edit/{grado}',  [GradoController::class, 'edit'])->name('grados.edit');
//update
Route::put('grados_update/{grado}', [GradoController::class, 'update'])->name('grados.update');
//delete
Route::delete('grados_delete/{grado}', [GradoController::class, 'destroy'])->name('grados.delete');
//show
Route::get('grados_show/{grado}', [GradoController::class, 'show'])->name('grados.show');
//Agregar Profesor
Route::post('agregar_profesor/{grado}', [GradoController::class, 'agregar_profesor'])->name('grados.agregar_profesor');
//Filtro
Route::post('filter_grados', [GradoController::class, 'filter'])->name('grados.filter');

/* ALUMNOS */

//index
Route::get('alumnos_index',  [AlumnoController::class, 'index'])->name('alumnos.index');
//create
Route::get('alumnos_create',  [AlumnoController::class, 'create'])->name('alumnos.create');
//store
Route::post('alumnos_store', [AlumnoController::class, 'store'])->name('alumnos.store');
//edit
Route::get('alumnos_edit/{alumno}',  [AlumnoController::class, 'edit'])->name('alumnos.edit');
//update
Route::put('alumnos_update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
//delete
Route::delete('alumnos_delete/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.delete');
//show
Route::get('alumnos_show/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
//Filtro
Route::post('filter_alumnos', [AlumnoController::class, 'filter'])->name('alumnos.filter');

/* PROFESORES */

//index
Route::get('profesores_index',  [ProfesorController::class, 'index'])->name('profesores.index');
//create
Route::get('profesores_create',  [ProfesorController::class, 'create'])->name('profesores.create');
//store
Route::post('profesores_store', [ProfesorController::class, 'store'])->name('profesores.store');
//edit
Route::get('profesores_edit/{profesor}',  [ProfesorController::class, 'edit'])->name('profesores.edit');
//update
Route::put('profesores_update/{profesor}', [ProfesorController::class, 'update'])->name('profesores.update');
//delete
Route::delete('profesores_delete/{profesor}', [ProfesorController::class, 'destroy'])->name('profesores.delete');
//show
Route::get('profesores_show/{profesor}', [ProfesorController::class, 'show'])->name('profesores.show');
//Filtro
Route::post('filter_profesores', [ProfesorController::class, 'filter'])->name('profesores.filter');




