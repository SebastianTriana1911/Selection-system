<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ReclutadorController;
use App\Http\Controllers\SuperUsuarioController;
use App\Models\SuperUsuario;

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


// ---------------------------- RUTAS DEL CONTROLADOR USER ---------------------------------------
// Rutas de la clase Users -> retorna la vista register para crear un usuario
Route::get('user/create', [UserController::class, 'create'])->name('user.create')->middleware('guest');

// Ruta para eliminar un usuario
Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Ruta para actualizar un rol de alguna registro de la base de datos
Route::post('user/uptade/rol/{id}', [UserController::class, 'cambioRol'])->name('update.rol');  
// -----------------------------------------------------------------------------------------------


// ----------------------------- RUTAS DEL CONTROLADOR CANDIDATO ---------------------------------
// Ruta store del controlador Candidato para registrar datos en la tabla Users y Candidatos a la vez
Route::post('candidato/store', [CandidatoController::class, 'store'])->name('candidato.store');
// -----------------------------------------------------------------------------------------------


// ----------------------------- RUTAS DEL CONTROLADOR DEL SUPER USUARIO -------------------------
// Ruta para mostrar el index de un administrador al registrarse 
Route::get('super/index', [SuperUsuarioController::class, 'index'])->name('super.index')->middleware('auth');

// Ruta que al llamar muestra la vista para crear un registro de un administrador (Super Usuario)
Route::get('super/create', [SuperUsuarioController::class, 'create'])->name('super.create')->middleware('auth');

// Ruta store del controlador SuperUsuario para registrar datos en la tabla Users y SuperUsuario a la vez
Route::post('super/store', [SuperUsuarioController::class, 'store'])->name('super.store');

// Ruta listar instructores que por medio de un foreach en la vista permite iterar la lisya de instructores
// que hay en la base de datos
Route::get('super/listar/instructores', [SuperUsuarioController::class, 'listarInstructores'])->name('listar.instructores');

// Rutas dashboard de todos los roles para mostrarlos por medio de un listado en una vista
Route::get('super/dashboard/super', [SuperUsuarioController::class, 'dashboardSuper'])->name('dashboard.super');
Route::get('super/dashboard/instructor', [SuperUsuarioController::class, 'dashboardInstructor'])->name('dashboard.instructor');
Route::get('super/dashboard/candidatos', [SuperUsuarioController::class, 'dashboardCandidato'])->name('dashboard.candidato');
// ----------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR INSTRUCTORES ------------------------------
// Ruta create que permite crear un instructor por medio de un formulario
Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create')->middleware('auth');

// Ruta store que valida todos los datos ingresados en el formulario y los sube a la base de datos
Route::post('instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
// ----------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR RECLUTADOR ----------------------------------
// Ruta index para visualizar las opciones que tiene un reclutador al entrar por primera vez
Route::get('reclutador/index', [ReclutadorController::class, 'index'])->name('reclutador.index')->middleware('auth');

// Ruta createEmpresa que retorna una vista de un formulario para crear una empresa
Route::get('reclutador/empresa', [ReclutadorController::class, 'createEmpresa'])->name('reclutador.empresa');

// Ruta store que al llamarla valida cada uno de los datos para subirla a la base de datos
// y crear la empresa en la tabla empresas para que posteriormente a dicho registro en el
// campo id se le asigne al reclutador que la creo en el campo empresa_id
Route::post('empresa/store', [EmpresaController::class, 'store'])->name('empresa.store');
// ----------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR LOGIN Y LOGOUTS ------------------------------
// Ruta create del controlador login que retorna la vista para logiarse si ya cuenta con una cuenta
Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
// Ruta store que valida las credenciales del usuario que se esta autenticando
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
// Ruta store del controlador LogoutController que expira las credenciales que estan autenticadas y
// retorna nuevamente al welcome
Route::post('logout', [LogoutController::class, 'store'])->name('logout');
// ----------------------------------------------------------------------------------------------
