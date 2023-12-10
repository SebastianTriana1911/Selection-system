<?php

namespace App\Http\Controllers;

use App\Models\Funcion;
use App\Models\Ocupacion;
use Illuminate\Http\Request;

class FuncionController extends Controller{
    public function index(){
        
    }

    public function create($id){
        $ocupaciones = Ocupacion::find($id);
        $funciones = Funcion::all();

        return view('funcion.create', ['ocupaciones' => $ocupaciones, 
        'funciones' => $funciones]);
    }

    public function store(Request $request, $id){
        $ocupacion = Ocupacion::find($id);
        $funcion = new Funcion();
        $funcion -> funcion = $request -> funcion;
        $funcion -> ocupacion_id = $ocupacion -> id;

        $funcion -> save();

        return redirect()->back();
    }

    public function show(string $id){
        
    }

    public function edit($ocupacion, $id){
        $ocupacion = Ocupacion::find($ocupacion);
        $funcion = Funcion::find($id);
        return view('funcion.edit', ['funcion' => $funcion, 'ocupacion' => $ocupacion]);
    }

    public function update(Request $request, string $id){
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
