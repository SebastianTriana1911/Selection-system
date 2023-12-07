<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCandidato;

class CandidatoController extends Controller{
    public function index(){
        
    }

    public function create(){
        
    }

    // -------------------- METODO STORE ------------------------
    public function store(StoreCandidato $request){
        // Al llamar el metodo store se instanciara un objeto de
        // la clase usuario y se llaman los campos correspondiente
        // a dicha tabla

        // Instancia de Usuario
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

        // Ya creador y subido los datos a la tabla Users se instancia
        // un objeto de la tabla candidato para subir los datos a los
        // campos correspondientes de los candidatos
        // Instancia de Candidato
        $candidato = new Candidato();
        $candidato -> fecha_nacimiento = $request -> fecha_nacimiento;
        $candidato -> direccion = $request -> direccion;
        $candidato -> telefono = $request -> telefono;
        $candidato -> perfil_ocupacional = $request -> perfil_ocupacional;
        $candidato -> user_id = $user -> id;
        $candidato -> save();

        // Se hace una redireccion al login para que el candidato
        // se autentique
        return redirect()->route('login');
    }
    // ----------------------------------------------------------

    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
        
    }

    public function destroy(string $id){
        
    }
}
