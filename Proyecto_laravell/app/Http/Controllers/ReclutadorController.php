<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;

class ReclutadorController extends Controller{
    public function index(){
        
    }

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
