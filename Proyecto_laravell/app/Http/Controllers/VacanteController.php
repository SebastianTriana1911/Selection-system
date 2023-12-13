<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Vacante;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\EducacionVacante;

class VacanteController extends Controller{
    public function index($id){
        $empresa = Empresa::find($id);
        $vacantes = Vacante::all();
        $contador = 0;

        foreach($vacantes as $vacante){
            $contador = $contador + 1;
        }

        return view('vacante.index', ['vacantes' => $vacantes,
        'empresa' => $empresa, 'contador' => $contador]);
    }

    public function create($id){
        $empresa = Empresa::find($id);
        $cargos = Cargo::all();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        return view('vacante.create', ['empresa' => $empresa,
        'cargos' => $cargos, 'paises' => $paises, 
        'departamentos' => $departamentos, 'municipios' => $municipios]);
    }

    public function store(Request $request){
        $vacante = new Vacante();
        $vacante -> codigo = $request -> codigo;
        $vacante -> num_vacante = $request -> num_vacante;
        $vacante -> meses_experiencia = $request -> meses_experiencia;
        $vacante -> salario = $request -> salario;
        $vacante -> tipo_salario = $request -> tipo_salario;
        $vacante -> tipo_contrato = $request -> tipo_contrato;
        $vacante -> tipo_jornada = $request -> tipo_jornada;
        $vacante -> empresa_id = $request -> empresa_id; 
        $vacante -> cargo_id = $request -> cargo_id;
        $vacante -> municipio_id = $request -> municipio_id;

        $vacante -> save();

        $educacion = new EducacionVacante();
        $educacion -> nivel_estudio = $request -> nivel_estudio;
        $educacion -> descripcion = $request -> descripcion;
        $educacion -> puntos = $request -> puntos;
        $educacion -> vacante_id = $vacante -> id;
        $educacion -> save();

        return redirect()->route('reclutador.index');
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
