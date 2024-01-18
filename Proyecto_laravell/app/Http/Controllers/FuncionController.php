<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFunciones;
use App\Http\Requests\UpdateFunciones;
use App\Models\Funcion;
use App\Models\Ocupacion;
use Illuminate\Http\Request;

class FuncionController extends Controller{
    public function create($id){
        $ocupaciones = Ocupacion::find($id);
        $funciones = Funcion::all();

        return view('funcion.create', ['ocupaciones' => $ocupaciones, 
        'funciones' => $funciones]);
    }

    public function store(StoreFunciones $request, $id){
        $ocupacion = Ocupacion::find($id);
        $funcion = new Funcion();
        $funcion -> funcion = $request -> funcion;
        $funcion -> ocupacion_id = $ocupacion -> id;
        $funcion -> save();

        return redirect()->back();
    }

    public function edit($ocupacion, $id){
        $ocupacion = Ocupacion::find($ocupacion);
        $funcion = Funcion::find($id);
        return view('funcion.edit', ['funcion' => $funcion, 'ocupacion' => $ocupacion]);
    }

    public function update(UpdateFunciones $request, string $id){
        $funcion = Funcion::find($id);
        $funcion -> funcion = $request -> funcion;
        $funcion -> save();

        return redirect()->back();
    }

    public function destroy(string $id){
        $funcion = Funcion::find($id);
        $funcion -> delete();

        return redirect()->back();
    }
}
