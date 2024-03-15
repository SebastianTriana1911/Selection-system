<?php
// El controlador CargoController esta relacionado al rol
// del reclutador ya que es el, el encargado de las actividades
// como crear actualizar y eliminar en este caso cargos relacionados
// a la empresa en la que esta vinculado 

namespace App\Http\Controllers;

use App\Http\Requests\StoreCargo;
use App\Http\Requests\UpdateCargo;
use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Ocupacion;
use Illuminate\Http\Request;

class CargoController extends Controller{
    // -------------------- CREATE ------------------------
    public function create($id){
        $ocupaciones = Ocupacion::all();
        $cargos = Cargo::all();
        $empresa = Empresa::find($id);

        return view('cargo.create', ['ocupaciones' => $ocupaciones, 
        'empresa' => $empresa, 'cargos' => $cargos]);
    }
    // ----------------------------------------------------


    // --------------------- STORE ------------------------
    public function store(StoreCargo $request){
        $cargo = new Cargo();

        $cargo -> cargo = $request -> cargo;
        $cargo -> habilidad = $request -> habilidad;
        $cargo -> competencia = $request -> competencia;
        $cargo -> ocupacion_id = $request -> ocupacion_id; 
        $cargo -> empresa_id = $request -> empresa_id;
        $cargo -> save();

        return redirect()->back();
    }
    // ----------------------------------------------------


    // -------------------- SHOW ---------------------------
    public function show(string $id){
        $ocupaciones = Ocupacion::all();
        $cargo = Cargo::find($id);

        return view('cargo.show', ['ocupaciones' => $ocupaciones,
        'cargo' => $cargo]);
    }
    // ----------------------------------------------------


    // -------------------- UPDATE -------------------------
    public function update(UpdateCargo $request, string $id){
        $cargo = Cargo::find($id);

        $cargo -> cargo = $request -> cargo;
        $cargo -> habilidad = $request -> habilidad;
        $cargo -> competencia = $request -> competencia;
        $cargo -> ocupacion_id = $request -> ocupacion_id;
        $cargo -> save();

        return redirect()->back();
    }
    // ----------------------------------------------------


    // -------------------- DELETE -------------------------
    public function destroy(string $id){
        $cargo = Cargo::find($id);
        $cargo -> delete();

        return redirect()->back();
    }
    // ----------------------------------------------------

}
