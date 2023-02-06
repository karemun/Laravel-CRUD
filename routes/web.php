<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController; //Acceder a la clase de EmpleadoController
use PhpParser\Node\Expr\Empty_;

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

/* 
// ***************************************************
// Rutas inecesarias despues de escribir la linea 32
// ***************************************************

Route::get('/empleado', function () { //Ruta
    return view('empleado.index'); //Carpeta.archivo
});

//Accede al controlador de Empleado, a la funcion create
Route::get('/empleado/create', [EmpleadoController::class, 'create']);
*/

//Con esta instruccion, se puede acceder a todas las url y funciones de EmpleadoController
Route::resource('empleado', EmpleadoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
