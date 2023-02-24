<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController; //Acceder a la clase de EmpleadoController
use Illuminate\Support\Facades\Auth;
//use PhpParser\Node\Expr\Empty_;

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
    return view('auth.login'); //Redirige a login
});

//Con esta instruccion, se puede acceder a todas las url y funciones de EmpleadoController
Route::resource('empleado', EmpleadoController::class)->middleware('auth'); //->Niega el acceso a otras url sin auth

Auth::routes(['register'=>true, 'reset'=>false]); //Opcion de registrar y se quita el olvido contraseña

//Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

//Cuando el usuario inicie sesion, redirige al index de empleados
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
