<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SuperUsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta principal welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');


// ----------------------------------------------------------------------------------------------
// Rutas de la clase Users -> retorna la vista register para crear un usuario
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// ----------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------
// Ruta store del controlador Candidato para registrar datos en la tabla Users y Candidatos a la vez
Route::post('candidato/store', [CandidatoController::class, 'store'])->name('candidato.store');
// ----------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------
Route::get('super/index', [SuperUsuarioController::class, 'index'])->name('super.index')->middleware('auth');
// Ruta store del controlador SuperUsuario para registrar datos en la tabla Users y SuperUsuario a la vez
Route::post('super/store', [SuperUsuarioController::class, 'store'])->name('super.store');
Route::get('super/listar/instructores', [SuperUsuarioController::class, 'listarInstructores'])->name('listar.instructores');
// ----------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------
Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create')->middleware('auth');
Route::post('instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
// ----------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------
// Ruta create del controlador login que retorna la vista para logiarse si ya cuenta con una cuenta
Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
// Ruta store que valida las credenciales del usuario que se esta autenticando
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
// Ruta store del controlador LogoutController que expira las credenciales que estan autenticadas y
// retorna nuevamente al welcome
Route::post('logout', [LogoutController::class, 'store'])->name('logout');
// ----------------------------------------------------------------------------------------------
