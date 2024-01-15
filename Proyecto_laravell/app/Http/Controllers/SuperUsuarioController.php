<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Role;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Municipio;
use App\Models\Profesion;
use App\Models\Instructor;
use App\Models\Reclutador;
use App\Models\Departamento;
use App\Models\SuperUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreSuperUsuario;

class SuperUsuarioController extends Controller{
    // -------------------------- METODO INDEX ------------------------------
    public function index(){
        // Para hayar algun campo que corresponda al usuario autenticado
        // se hace la validacion de quien este autenticado para mostrar
        // dicho usuario con el campo correspondiente en la vista
        $super = Auth::user();
        return view('super.home', ["super" => $super]);
    }
    // -----------------------------------------------------------------------


    // -------------------------- METODO CREATE ------------------------------
    public function create(){
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        return view('super.create', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }
    // -----------------------------------------------------------------------


    // -------------------------- METODO STORE -----------------------------
    // Metodo store, como un super usuario es un usuario se debe de crear
    // primero el registro de la tabla usuarios para asi proceder con la 
    // insercion de la tabla super usuarios ya que esta depende de los
    // registros de la tabla usuarios
    public function store(StoreSuperUsuario $request){

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

        return redirect()->route('super.index');
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
    public function dashboardSuper(){
        $supers = SuperUsuario::all();
        $roles = Role::all();
        return view('super.dashboard',
        ['supers' => $supers , 'roles' => $roles]);
    }

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

    public function dashboardReclutador(){
        $reclutadores = Reclutador::all();
        $roles = Role::all();
        return view('reclutador.dashboard', 
        ['reclutadores' => $reclutadores, 'roles' => $roles]);
    }

    // public function dashboardSeleccionador(){
    //     $instructores = Instructor::all();
    //     $roles = Role::all();
    //     return view('instructor.dashboard', 
    //     ['instructores' => $instructores, 'roles' => $roles]);
    // }    
    // -----------------------------------------------------------------------


    // ---------------------- METODOS SINTESISINSTRUCTOR ----------------------
    // Al llamar el metodo sintesisInstructor se hace la busqueda por medio del
    // metodo estatico where para hayar la primera coinsidencia. Primero se haya
    // el usuario con el id correspondiente para despues comparar ese usuario con
    // el campo de user_id del instructor. Luego hayamos todas las profesiones del
    // instructor que se acabo de allar para iterar todas las listas correspondientes
    // a sus profesiones y se hace la validacion donde si el documento es null siga
    // iterando y cuando no sea nulo que se suba solo la ruta del documento que se
    // subio (Esto se logra con el metodo basename)
    public function sintesisInstructor($id){
        // Como las profesiones de un instructor pueden ser muchas se desea guardar
        // por cada profesion la ruta del documento que subio
        $rutas = [];

        $user = User::find($id);
        $instructor = Instructor::where('user_id', $user->id)->get();
        $instructor = $instructor->first();

        $profesionInstructor = Profesion::where('instructor_id', $instructor->id)->get();
        foreach ($profesionInstructor as $profesion){
            if ($profesion->documento == null){
                continue;
            }else{
                $rutas[] = basename($profesion->documento);
            }
        }
        $imagen = null;

        if($user->genero == 'Masculino'){
            $imagen = asset('imagenes\Icono-hombre.png');
        }else{
            $user = asset('imagenes\Icono-mujer.png');
        }

        return view('super.sintesisInstructor', ['user' => $user, 'instructor' => $instructor,
            'imagen' => $imagen, 'profesionInstructor' => $profesionInstructor,'rutas' => $rutas]);
    }
    // -----------------------------------------------------------------------
}
