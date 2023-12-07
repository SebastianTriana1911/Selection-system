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

    // -------------------------- METODO STORE -----------------------------
    // Metodo store, como un super usuario es un usuario se debe de crear
    // primero el registro de la tabla usuarios para asi proceder con la 
    // insercion de la tabla super usuarios ya que esta depende de los
    // registros de la tabla usuarios
    public function store(Request $request){

        // Se instancia un objeto de la case User
        $user = new User();

        // Se hace la insercion de cada uno de los campos dependiendo
        // de la informacion que se traiga desde el formulario
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
        
        // Se salva el registro para que se visualize en la bd 
        $user -> save();

        // Como la tabla super usuarios solo tiene un campo y es
        // la relacion que tiene con la tabla usuarios se hace la
        // insercion de la nueva instancia de la clase super usuario
        // y se accede al campo user_id pa que esta sea igual al id
        // del registro anterior que salvamos
        $super = new SuperUsuario();
        $super -> user_id = $user -> id;
        $super -> save();

        return redirect()->route('login');
    }
    // -----------------------------------------------------------------------


    // -------------------- METODO LISTAR INSTRUCTORES -----------------------
    // El metodo listar instructores nos permite ver todos los instructores que
    // hay en la base de datos, esto se consigue accediendo al modelo Instructor
    // que es el que contiene cada uno de los registros y con el metodo estatico
    // all me llama cada uno de los registros por medio de un array
    public function listarInstructores(){
        $instructores = Instructor::all();
        $user = Auth::user();

        return view('super.showInstructores', 
        ['instructores' => $instructores, 'user' => $user]);
    }
    // -----------------------------------------------------------------------


    // -------------------------- METODOS DASHBOARD --------------------------
    // El metodo dashboard hace la misma funcion que la de listar el unico cambio
    // es que dicha funcion retorna una vista la cual permite cambiarle el rol
    // al ROL que contenga el dashboard en ese momento
    public function dashboardInstructor(){
        $instructores = Instructor::all();
        $roles = Role::all();
        return view('instructor.dashboard',
        ['instructores' => $instructores, 'roles' => $roles]);
    }

    public function dashboardCandidato(){
        $candidatos = Candidato::all();
        $roles = Role::all();
        return view('candidato.dashboard', 
        ['candidatos' => $candidatos, 'roles' => $roles]);
    }

    // public function dashboardReclutador(){
    //     $instructores = Reclutador::all();
    //     $roles = Role::all();
    //     return view('instructor.dashboard', 
    //     ['instructores' => $instructores, 'roles' => $roles]);
    // }

    // public function dashboardSeleccionador(){
    //     $instructores = Instructor::all();
    //     $roles = Role::all();
    //     return view('instructor.dashboard', 
    //     ['instructores' => $instructores, 'roles' => $roles]);
    // }    
    // -----------------------------------------------------------------------

    

    public function show(string $id){

    }

    public function edit(string $id){

    }

    public function update(Request $request, string $id){

    }

    public function destroy(string $id){

    }
}
