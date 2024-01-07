<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Municipio;
use App\Models\Instructor;
use App\Models\Reclutador;
use App\Models\Departamento;
use App\Models\SuperUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function index(){
        
    }

    // -------------------------- METODOS CREATE --------------------------
    // Este metodo es el que retorna la vista para registrar un candidato, 
    // Se hace el llamado de los modelos de pais, departamento y municipio
    // con el metodo all para en la vista poderlos iterar por medio de un
    // foreach y asi mostrar todos los paises que contiene cada tabla en 
    // dicho momento
    public function create(){
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        return view('auth.register', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }
    // ---------------------------------------------------------------------

    public function store(Request $request){
        
    }

    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
        
    }

    // -------------------------- METODOS DESTROY ------------------------
    // El metodo destroy como se encuentra dentro del controlador User se
    // puede utilizar para eliminar cualquier registro de las tablas que
    // dependen de esta, recordemos que en este caso estan Super Usuarios,
    // Instructores, Candidatos, Seleccionadores y Reclutadores, asi que para
    // eliminar alguno de estos se debe de acceder a este metodo con su id
    // correspondiente para buscar dicho registro por medio del metodo estatico
    // find
    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('super.index');
    }
    // -------------------------------------------------------------------


    // --------------------- METODO CAMBIO DE ROL ------------------------
    // El metodo cambio de rol permite buscar mediante su id el registro
    // completo para asi validar si el campo role_id pertenece en este caso
    // a un candidato, se hace una validacion donde se busca en la tabla
    // candidato si el campo user_id es igual al id de la tabla user si ese
    // es el caso se elimina dicho registro, para luego validar cual fue el
    // rol al cual cambio y al registro que queda en la tabla usuario se actualiza
    // el campo role_id para luego salvarlo en su tabla correspondiente 
    public function cambioRol(Request $request, $id){
        $usuario = User::find($id);

        if ($usuario -> role_id == 1){
            $candidato = SuperUsuario::where('user_id',  $usuario -> id)->first();
            $candidato ->delete();

            if($request -> menu == 2){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $super = new Candidato();
                $super -> user_id = $usuario -> id;

                $super->save();
                return redirect()->back();
            }
            else if($request -> menu == 3){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $instructor = new Instructor();
                $instructor -> user_id = $usuario -> id;

                $instructor->save();
                return redirect()->back();
            }
            // else if($request -> menu == 4){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            //     $seleccionador = new Seleccionador();
            //     $seleccionador -> user_id = $usuario -> id;

            //     $seleccionador->save();
            //     return redirect()->route('super.index');
            // }
            else if($request -> menu == 5){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $reclutador = new Reclutador();
                $reclutador -> user_id = $usuario -> id;

                $reclutador->save();
                return redirect()->route('super.index');
            }
        }

        // Validacion donde se comprueba si el usuario al que se desea 
        // cambiar el rol es un candidato
        if ($usuario -> role_id == 2){
            $candidato = Candidato::where('user_id',  $usuario -> id)->first();
            $candidato ->delete();

            if($request -> menu == 1){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $super = new SuperUsuario();
                $super -> user_id = $usuario -> id;

                $super->save();
                return redirect()->back();
            }
            else if($request -> menu == 3){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $instructor = new Instructor();
                $instructor -> user_id = $usuario -> id;

                $instructor->save();
                return redirect()->back();
            }
            // else if($request -> menu == 4){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            //     $seleccionador = new Seleccionador();
            //     $seleccionador -> user_id = $usuario -> id;

            //     $seleccionador->save();
            //     return redirect()->route('super.index');
            // }
            // else if($request -> menu == 5){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

                $reclutador = new Reclutador();
                $reclutador -> user_id = $usuario -> id;

                $reclutador->save();
                return redirect()->route('super.index');
            }

        if ($usuario -> role_id == 3){
            $instructor = Instructor::where('user_id',  $usuario -> id)->first();
            $instructor ->delete();

            if($request -> menu == 1){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $admin = new SuperUsuario();
                $admin -> user_id = $usuario -> id;

                $admin->save();

                return redirect()->back();
            }
            else if($request -> menu == 2){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $candidato = new Candidato();
                $candidato -> user_id = $usuario -> id;

                $candidato->save();
                return redirect()->back();
            }
            // else if($request -> menu == 4){
            //     $usuario -> role_id = $request -> menu;
            //     $usuario -> save();

            //     $seleccionador = new Seleccionador();
            //     $seleccionador -> user_id = $usuario -> id;

            //     $seleccionador->save();
            //     return redirect()->route('super.index');
            // }
            else if($request -> menu == 5){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();

                $reclutador = new Reclutador();
                $reclutador -> user_id = $usuario -> id;

                $reclutador->save();
                return redirect()->route('super.index');
            }
        }
    }

    public function restaurarCreate(){
        return view('auth.restaurar');
    }

    public function restaurarContraseña(Request $request){
        $usuarios = User::all();

        foreach ($usuarios as $usuario){
            if ($usuario -> password == $request -> password);

            $usuario -> password = Hash::make($request -> password);
            $usuario -> save();

            return redirect()->route('login');
        }

        return redirect()->back();
    }
}
