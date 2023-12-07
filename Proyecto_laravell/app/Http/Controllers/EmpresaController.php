<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller{
    public function index(){
    
    }

    public function create(){
        
    }

    // ---------------------- METODO STORE -------------------------
    public function store(Request $request){
        // Al llamar el metodo store significa que se creara un
        // nuevo regitro de la tabla empresas, como la empresa 
        // la crea un reclutador y esta esta asociada a este,
        // primero deberemos de crear el registro de la empresa
        // para mas adelante ocupara el campo id de dicho registro
        $empresa = new Empresa();

        $empresa -> nit = $request -> nit;
        $empresa -> nombre = $request -> nombre;
        $empresa -> direccion = $request -> direccion;
        $empresa -> municipio_id = $request -> municipio_id;
        $empresa -> save();

        // Accedemos al usuario autenticado, en este caso
        // recuperaremos el registro de la tabla users a la que
        // pertenese el reclutador autenticado
        $user = Auth::user();

        // Se hace la busqueda del registro de la tabla reclutadores
        // por medio de la relacion que hay entre la tabla users y
        // la tabla reclutadores. Pues accederemos al registro de la
        // tabla users a la que pertenece el reclutador ya autenticado
        // y se le asigna la relacion que en este caso sera con la
        // relacion del reclutador, esto quiere decir que buscaremos
        // el campo foraneo de la tabla reclutadores donde coinsida con
        // el campo autenticado de la tabla users
        $reclutador = $user->reclutador;

        // Ya accedido al registro del reclutador autenticado, accedemos
        // al campo empresa_id que se encuentra en null y le asociamos la
        // variable que contiene la empresa creada en el campo id
        $reclutador -> empresa_id = $empresa -> id;
        $reclutador -> save();
        
        // return redirect()->route('');
    }
    // -------------------------------------------------------------

    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
    
    }

    public function destroy(string $id){
        
    }
}
