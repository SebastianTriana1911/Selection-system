<?php

namespace App\Http\Controllers;

use App\Models\EducacionVacante;
use App\Models\Empresa;
use App\Models\Vacante;
use Illuminate\Http\Request;

class EducacionVacanteController extends Controller{

    public function index(){
    
    }

    public function create(Vacante $vacante, Empresa $empresa){
        $educaciones = $vacante -> educacionVacante;

        return view('educacionVacante.create', ['educaciones' => $educaciones,
        'empresa' => $empresa, 'vacante' => $vacante]);
    }

    public function store(Request $request, Vacante $vacante){
        $educaciones = $vacante -> educacionVacante;
        $lista = [];

        foreach ($educaciones as $educacion){
            if($educacion -> vacante_id == $vacante -> id){
                array_push($lista, $educacion -> nivel_estudio);
            }
        }

        foreach ($lista as $niveles){
            if ($niveles == $request -> nivel_estudio){
                return redirect()->back();
            }
        }
        $educacion = new EducacionVacante();
        $educacion -> nivel_estudio = $request -> nivel_estudio;
        $educacion -> puntos = $request -> puntos;
        $educacion -> descripcion = $request -> descripcion;
        $educacion -> vacante_id = $vacante -> id;

        $educacion -> save();

        return redirect()->back();
    }

    public function show(string $id){
        
    }

    public function edit(EducacionVacante $educacion, Vacante $vacante, Empresa $empresa){
        return view('educacionVacante.edit', ['educacion' => $educacion, 'vacante' => $vacante, 'empresa' => $empresa]);
    }

    public function update(Request $request, Vacante $vacante, EducacionVacante $educacion){
        $educacion -> nivel_estudio = $request -> nivel_estudio;
        $educacion -> puntos = $request -> puntos;
        $educacion -> descripcion = $request -> descripcion;
        $educacion -> vacante_id = $vacante -> id;

        $educacion -> update();

        return redirect()->back();
    }

    public function destroy(EducacionVacante $id){
        $id -> delete();
        return redirect()->back();
    }
}
