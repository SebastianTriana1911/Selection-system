<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Funcion;
use App\Models\Reclutador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclutadorController extends Controller{

    // ---------------------- METODO INDEX EMPRESA ---------------------
    // AL llamar el metodo index se realizara una validacion para saber 
    // si el reclutador ya pertenece a una empresa, si este no es el caso
    // lo debera retornar a la vista que contiene la informacion para
    // postularse o crear una empresa
    public function index(){
        // Para hayar algun campo que corresponda al usuario autenticado
        // se hace la validacion de quien este autenticado para mostrar
        // dicho usuario con el campo correspondiente en la vista
        $reclutador = Auth::user();
        
        // Se hace la validacion accediendo al usuario autenticado, luego
        // accediendo a la tabla reclutador y validando si el campo empresa_id
        // es null para hacer que se postule o cree una empresa por medio de
        // una vista
        if($reclutador->reclutador->empresa_id == null){
            return view('reclutador.index', ['reclutador' => $reclutador]);
        }
        else {
            // Se desea acceder al nombre de la empresa asi que se accede al
            // usuario autenticado a la tabla reclutadores como hay una
            // relacion entre reclutadores y empresas accedemos a la tabla
            // empresas y ya aqui accederemos la campo nombre para mostrarlo
            $empresa = $reclutador->reclutador->empresa->nombre;

            // A una variable llamada empresaId se le asigna el id de la 
            // empresa a la cual el reclutador esta postulado para asi
            // mostrar los datos de esa empresa en una vista, se necesita
            // el id de dicha empresa para acceder a ese registro unicamente
            $empresaId = $reclutador->reclutador->empresa->id;

            return view('reclutador.home', ['reclutador' => $reclutador,
            'empresa' => $empresa, 'empresaId' => $empresaId]);
        }
    }
    // -----------------------------------------------------------------


    // ---------------------- METODO CREATE EMPRESA --------------------
    public function createEmpresa(){
        // Al llamar el metodo createEmpresa mostraremos la vista
        // la cual contiene el formulario para crear una empresa o
        // si desea poder postularse a una empresa ya creada, como
        // dicha empresa tiene el campo Pais, Departamento y
        // Municipio y dichos campos estan relacionadas a tablas 
        // con registros previamente insertados, para mostrarlos
        // por medio de un select en la vista llamamos el modelo
        // que apunta a la tabla de cada una de ellas con el metodo
        // estatico all() para que pueda iterar cada uno de los
        // registros por medio de un foreach 
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        // Se retorna la vista que contiene el formulario y se le
        // asignan las variables que contienen todos los registros de
        // las tablas ya mencionadas para que las itere
        return view('reclutador.crearEmpresa', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }
    // -----------------------------------------------------------------

    public function desvincular(){
        $user = Auth::user();
        $reclutador = $user -> reclutador;

        $reclutador -> empresa_id = null;
        $reclutador -> save();

        return redirect()->route('reclutador.index');
    }

    public function create(){
        
    }

    public function store(Request $request){
        
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
