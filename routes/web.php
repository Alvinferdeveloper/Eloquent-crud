<?php

use App\Http\Controllers\aulaController;
use App\Http\Controllers\claseController;
use App\Http\Controllers\imparteController;
use App\Http\Controllers\migracionController;
use App\Http\Controllers\profesorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

//clases
Route::get('/listarClases',[claseController::class,"listar"]);
Route::get('/crearClase',[claseController::class,"crear"]);
Route::post('/insertarClase',[claseController::class,"insertar"]);
Route::get('/editarClase/{codigo}',[claseController::class,"editar"]);
Route::post('/actualizarClase',[claseController::class,"actualizar"]);
Route::get('/eliminarClase/{codigo}',[claseController::class,"eliminar"]);


//profesores
Route::get('/listarProfesores',[profesorController::class,"listar"]);
Route::get('/crearProfesor',[profesorController  ::class,"crear"]);
Route::post('/insertarProfesor',[profesorController::class,"insertar"]);
Route::get('/editarProfesor/{id}',[profesorController::class,"editar"]);
Route::post('/actualizarProfesor',[profesorController::class,"actualizar"]);
Route::get('/eliminarProfesor/{id}',[profesorController::class,"eliminar"]);


//aulas

Route::get('/listarAulas',[aulaController::class,"listar"]);
Route::get('/crearAula',[aulaController::class,"crear"]);
Route::post('/insertarAula',[aulaController::class,"insertar"]);
Route::get('/editarAula/{id}',[aulaController::class,"editar"]);
Route::post('/actualizarAula',[aulaController::class,"actualizar"]);
Route::get('/eliminarAula/{id}',[aulaController::class,"eliminar"]);

//imparticiones

Route::get('/listarImparticiones',[imparteController::class,"listar"]);
Route::get('/crearImparticion',[imparteController::class,"crear"]);
Route::post('/insertarImparticion',[imparteController::class,"insertar"]);
Route::get('/editarImparticion/{codclase}/{idaula}/{idprofesor}',[imparteController::class,"editar"]);
Route::post('/actualizarImparticion',[imparteController::class,"actualizar"]);
Route::get('/eliminarImparticion/{codclase}/{idaula}/{idprofesor}',[imparteController::class,"eliminar"]);

//Migraciones

Route::get('/listarMigraciones',[migracionController::class,"listar"]);