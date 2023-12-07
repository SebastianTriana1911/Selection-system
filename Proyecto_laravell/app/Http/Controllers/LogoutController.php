<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller{

    // -------------- METODO STORE --------------
    public function store(Request $request){
        // Al llamar el metodo store estaremos 
        // validando un formulario el cual hace
        // referencia a poder cerrar sesion de 
        // un usuario ya autenticado
        auth()->logout();
        session()->invalidate();

        return redirect()->route('welcome');
    }
    // ------------------------------------------
}
