<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogin;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function index(){

    }

    // --------------------- METODO CREATE -------------------------
    public function create(){
        // El metodo create solo retorna la vista que
        // contiene el formulario donde se logueara los
        // usuarios
        return view('auth.login');
    }
    // --------------------------------------------------------------


    // ----------------------- METODO STORE -------------------------
    public function store(StoreLogin $request){
        // Al llamar el metodo store se realiza una validacion
        // donde se valida si las credenciales email y password
        // corresponden a algun registro de la base de datos si
        // dicha respues es false lo redirecciona nuevamente al
        // login
        if(!auth()->attempt($request->only('email', 'password'))){
            return redirect()->back();
        }

        // Si la respues anterior fue true accederemos al registro
        // que se autentico para hacer la validacion de cual rol
        // tiene el registro y asi retornarle la vista necesaria a
        // su rol
        $user = Auth::user();

        // Se hace la validacion de la variable que contiene el
        // registro del usuario que se autentico y se accede al
        // campo role_id para que segun el rol se le muestre su
        // vista correspondiente

        // Role_id == 1 = Administador
        if($user -> role_id == 1){
            return redirect()->route('super.index');
        }
        // Role_id == 2 = Candidato
        else if($user -> role_id ==2){
            return redirect()->route('candidato.index');
        }
        // Role_id == 3 = Instructor
        // else if($user -> role_id ==3){
        //     return redirect()->route('instructor.home');
        // }
        // Role_id == 4 = Seleccionador
        else if($user -> role_id ==4){
            return redirect()->route('seleccionador.index');
        }
        // Role_id == 5 = Reclutador
        else if($user->role_id==5){
            return redirect()->route('reclutador.index');
        }
    }
    // --------------------------------------------------------------


    public function show(string $id){

    }

    public function edit(string $id){

    }

    public function update(Request $request, string $id){

    }

    public function destroy(string $id){

    }
}
