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
use App\Models\Funcion;

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

    public function buscar(Request $request, $id){
        $empresa = Empresa::find($id);
        $busqueda = $request -> busqueda;
        $contador = 0;
        
        $resultado = Vacante::whereHas('cargo', function ($query) use ($busqueda){
            $query->where('cargo', 'like', '%'.$busqueda.'%');
        })->get();
        $encontrado = $resultado -> isNotEmpty();

        if ($encontrado == 0){
            return redirect()->route('vacante.index', $empresa -> id);
        }else{
            foreach ($resultado as $resul){
                $contador = $contador + 1;
            }
            return view('vacante.resultado', ['resultado' => $resultado,
            'contador' => $contador, 'empresa' => $empresa]);
        }
    }

    public function show(Vacante $id, Empresa $empresa){
        $educaciones = $id -> educacionVacante;

        return view('vacante.show', ['vacante' => $id, 
        'empresa' => $empresa, 'educaciones' => $educaciones]);
    }

    public function edit(Vacante $id, Empresa $empresa){
        $cargos = Cargo::all();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        return view('vacante.edit', ['empresa' => $empresa,
        'cargos' => $cargos, 'paises' => $paises, 
        'departamentos' => $departamentos, 'municipios' => $municipios,
        'vacante' => $id]);
        
    }

    public function update(Request $request, Vacante $id, Empresa $empresa){
        $id -> codigo = $request -> codigo;
        $id -> num_vacante = $request -> num_vacante;
        $id -> meses_experiencia = $request -> meses_experiencia;
        $id -> salario = $request -> salario;
        $id -> tipo_salario = $request -> tipo_salario;
        $id -> tipo_contrato = $request -> tipo_contrato;
        $id -> tipo_jornada = $request -> tipo_jornada;
        $id -> empresa_id = $request -> empresa_id; 
        $id -> cargo_id = $request -> cargo_id;
        $id -> municipio_id = $request -> municipio_id;

        $id -> save();
        return redirect()->route('vacante.index', $empresa -> id);
    }

    public function destroy(Vacante $id){
        $id -> delete();
        return redirect()->back();
    }
}
