<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Role;
use App\Models\User;
use App\Models\Instructor;
use App\Models\SuperUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperUsuarioController extends Controller{

    public function index(){
        // Para hayar algun campo que corresponda al usuario autenticado
        // se hace la validacion de quien este autenticado para mostrar
        // dicho usuario con el campo correspondiente en la vista
        $super = Auth::user();
        return view('super.home', ["super" => $super]);
    }

    public function create(){

    }

    public function store(Request $request){
        $user = new User();

        $user -> num_documento = $request -> num_documento;
        $user -> tipo_documento = $request -> tipo_documento;
        $user -> nombre = $request -> nombre;
        $user -> apellido = $request -> apellido;
        $user -> genero = $request -> genero;
        $user -> estado_civil = $request -> estado_civil;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request->password);
        $user -> municipio_id = $request -> municipio_id;
        $user -> role_id = $request -> role_id;
        $user -> save();

        $super = new SuperUsuario();
        $super -> user_id = $user -> id;
        $super -> save();

        return redirect()->route('login');
    }

    public function listarInstructores(){
        $instructores = Instructor::all();
        $user = Auth::user();

        return view('super.showInstructores', ['instructores' => $instructores, 'user' => $user]);
    }

    public function dashboardInstructor(){
        $instructores = Instructor::all();
        $roles = Role::all();
        return view('instructor.dashboard', ['instructores' => $instructores, 'roles' => $roles]);
    }

    // public function dashboardReclutador(){
    //     $instructores = Reclutador::all();
    //     $roles = Role::all();
    //     return view('instructor.dashboard', ['instructores' => $instructores, 'roles' => $roles]);
    // }

    // public function dashboardSeleccionador(){
    //     $instructores = Instructor::all();
    //     $roles = Role::all();
    //     return view('instructor.dashboard', ['instructores' => $instructores, 'roles' => $roles]);
    // }

    public function dashboardCandidato(){
        $candidatos = Candidato::all();
        $roles = Role::all();
        return view('candidato.dashboard', ['candidatos' => $candidatos, 'roles' => $roles]);
    }

    public function show(string $id){

    }

    public function edit(string $id){

    }

    public function update(Request $request, string $id){

    }

    public function destroy(string $id){

    }


}
