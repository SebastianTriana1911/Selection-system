<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOcupacion;
use App\Models\Ocupacion;
use Illuminate\Http\Request;

class OcupacionController extends Controller{
    public function create(){
        $ocupaciones = Ocupacion::all();
        return view('ocupacion.create', ['ocupaciones' => $ocupaciones]);
    }

    public function store(StoreOcupacion $request){
        $ocupacion = new Ocupacion();

        $ocupacion -> nombre = $request -> nombre;
        $ocupacion -> descripcion = $request -> descripcion;
        $ocupacion -> save();

        return redirect()->back();
    }

    public function show(string $id){
        $ocupacion = Ocupacion::find($id);

        // Como la tabla ocupaciones tiene muchas funciones accedo al metodo funcion
        // para que me retorne por medio de una variable un array y iterarlo en la vista
        $funciones = $ocupacion -> funcion;
        return view('ocupacion.show', ['ocupacion' => $ocupacion, 'funciones' => $funciones]);
    }

    public function update(Request $request, string $id){
        $ocupacion = Ocupacion::find($id);
        $ocupacion->update($request->all());
        
        return redirect()->back();
    }

    public function destroy(string $id){
        $ocupacion = Ocupacion::find($id);
        $ocupacion -> delete();

        return redirect()->back();
    }
}
