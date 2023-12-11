<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Ocupacion;
use Illuminate\Http\Request;

class CargoController extends Controller{
    public function index(){
        
    }

    public function create($id){
        $ocupaciones = Ocupacion::all();
        $cargos = Cargo::all();
        $empresa = Empresa::find($id);

        return view('cargo.create', ['ocupaciones' => $ocupaciones, 
        'empresa' => $empresa, 'cargos' => $cargos]);
    }

    public function store(Request $request){
        $cargo = new Cargo();

        $cargo -> cargo = $request -> cargo;
        $cargo -> habilidad = $request -> habilidad;
        $cargo -> competencia = $request -> competencia;
        $cargo -> ocupacion_id = $request -> ocupacion_id; 
        $cargo -> empresa_id = $request -> empresa_id;

        $cargo -> save();

        return redirect()->back();
    }

    public function show(string $id){
        $ocupaciones = Ocupacion::all();
        $cargo = Cargo::find($id);

        return view('cargo.show', ['ocupaciones' => $ocupaciones,
        'cargo' => $cargo]);
    }

    public function edit(string $id){

    }

    public function update(Request $request, string $id){
        $cargo = Cargo::find($id);

        $cargo -> cargo = $request -> cargo;
        $cargo -> habilidad = $request -> habilidad;
        $cargo -> competencia = $request -> competencia;
        $cargo -> ocupacion_id = $request -> ocupacion_id;

        $cargo -> save();
        return redirect()->back();
    }

    public function destroy(string $id){
        $cargo = Cargo::find($id);
        $cargo -> delete();

        return redirect()->back();
    }
}
