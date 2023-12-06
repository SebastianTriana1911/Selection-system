<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Municipio;
use App\Models\Instructor;
use App\Models\Departamento;
use App\Models\SuperUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function index(){
        
    }

    public function create(){
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        return view('auth.register', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }

    public function store(Request $request){
        
    }

    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
        
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('super.index');
    }

    public function cambioRol(Request $request, $id){
        $usuario = User::find($id);

        if ($usuario -> role_id == 3){
            $instructor = Instructor::where('user_id',  $usuario -> id)->first();
            $instructor ->delete();

            if($request -> menu == 2){
                $usuario -> role_id = $request -> menu;
                $usuario -> save();
                $admin = new Candidato();

                $admin -> user_id = $usuario -> id;

                $admin->save();

                return redirect()->route('super.index');
            }
        }
    }
}
