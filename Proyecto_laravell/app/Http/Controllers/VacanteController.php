<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacante;
use App\Http\Requests\UpdateVacante;
use Illuminate\Validation\Rule;
use App\Models\Pais;
use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Vacante;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\EducacionVacante;
use App\Models\Funcion;

class VacanteController extends Controller
{
    // ---------------------- METODO INDEX -------------------------
    // Al llamar el metodo index se desea mostar en una vista en donde
    // se itera por medio de un forelse todas las vacantes creadas en
    // la BD ademas el contador de cuantas vacantes son creadas y cuantas
    // se muestran
    public function index($id)
    {
        $empresa = Empresa::find($id);
        $vacantes = Vacante::all();
        $contador = 0;

        foreach ($vacantes as $vacante) {
            $contador = $contador + 1;
        }

        return view('vacante.index', [
            'vacantes' => $vacantes,
            'empresa' => $empresa, 'contador' => $contador
        ]);
    }
    // --------------------------------------------------------------


    // ------------------------- METODO CREATE ----------------------
    // Al llamar el metodo create se retorna la vista en la que se
    // crean todas las vacantes, en este caso se llaman todos los 
    // cargos creados para relacionarlos con la vacante el pais, el
    // departamento y la municipio de donde sera el lugar en que se 
    // se debe realizar el trabajo
    public function create($id)
    {
        $empresa = Empresa::find($id);
        $cargos = Cargo::all();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('vacante.create', [
            'empresa' => $empresa,
            'cargos' => $cargos, 'paises' => $paises,
            'departamentos' => $departamentos, 'municipios' => $municipios
        ]);
    }
    // --------------------------------------------------------------


    // ------------------------- METODO STORE -----------------------
    // AL llamar el metodo store se crea una nueva instancia del modelo
    // Vacante para ir llenando los campos relacionados a la tabla
    // vacantes de la bd, como hay una relacion entre las vacantes y
    // las educaciones que se debe de tener para poder postularse a la
    // vacante, se crea una nueva instancia del modelo Educacion vacante
    // para subir dichos datos a los campos relacionados en la bd
    public function store(StoreVacante $request)
    {
        $vacante = new Vacante();
        $vacante->codigo = $request->codigo;
        $vacante->num_vacante = $request->num_vacante;
        $vacante->meses_experiencia = $request->meses_experiencia;
        $vacante->salario = $request->salario;
        $vacante->tipo_salario = $request->tipo_salario;
        $vacante->tipo_contrato = $request->tipo_contrato;
        $vacante->tipo_jornada = $request->tipo_jornada;
        $vacante->empresa_id = $request->empresa_id;
        $vacante->cargo_id = $request->cargo_id;
        $vacante->municipio_id = $request->municipio_id;
        $vacante->save();

        $educacion = new EducacionVacante();
        $educacion->nivel_estudio = $request->nivel_estudio;
        $educacion->descripcion = $request->descripcion;
        $educacion->puntos = $request->puntos;
        $educacion->titulado = $request->titulado;
        $educacion->vacante_id = $vacante->id;
        $educacion->save();

        return redirect()->route('reclutador.index');
    }
    // --------------------------------------------------------------


    // ------------------------ METODO BUSCAR -----------------------
    // El metodo buscar nos ayudara a buscar por medio de una barra una
    // de las vacantes que esten dentro de nuestra bd, la logica de
    // este metodo funcionara buscando desde el modelo Vacante con el
    // metodo estatico whereHas ('Este metodo funciona para filtrar entre
    // tablas relacionadas, como vacantes esta relacionada con cargos
    // deseamos hacer una busqueda por medio del cargo por esa razon 
    // utlizamos dicho metodo'), como parametro le asignamos la tabla
    // por la cual deseamos que filtre la busqueda y que esta la relacione
    // con lo que nosotros hayamos colocado en el buscador, luego de 
    // esta consulta al query se le asigna el metodo where para que busque
    // un cargo (Recordemos que ya estamos en la tabla cargos) que se 
    // tenga alguna letra o palabra correspondiente al cargo que se
    // esta buscando y por el metodo get() lo muestre como un objeto. Esta
    // busqueda se logra con el metodo like que funciona de la misma
    // manera a como funciona el del SQL (%$busqueda%)
    public function buscar(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        $busqueda = $request->busqueda;
        $contador = 0;

        // Se busca la tabla con la cual tiene relacion el modelo principal
        // por medio del metodo estatico whereHas
        $resultado = Vacante::whereHas('cargo', function ($query) use ($busqueda) {

            // Se busca la coincidencia que tiene todos los cargos con la
            // busqueda que nosotros realizamos
            $query->where('cargo', 'like', '%' . $busqueda . '%')

                ->orWhere('codigo', 'like', '%' . $busqueda . '%');
        })->get();
        $encontrado = $resultado->isNotEmpty();

        if ($encontrado == 0) {
            return redirect()->route('vacante.index', $empresa->id);
        } else {
            foreach ($resultado as $resul) {
                $contador = $contador + 1;
            }
            return view('vacante.resultado', [
                'resultado' => $resultado,
                'contador' => $contador, 'empresa' => $empresa
            ]);
        }
    }
    // --------------------------------------------------------------


    // ------------------------ METODO SHOW -------------------------
    // Al llamar el metodo show se mostrara toda la informacion 
    // relacionada con la vacante, en esta vista se mostrara aparte de
    // los datos de la vacante, los datos del cargo relacionado a la
    // vacante y los datos de la ocupacion relacionadas con el cargo
    public function show(Vacante $id, Empresa $empresa)
    {
        $educaciones = $id->educacionVacante;
        $postulaciones = $id->postulacion;
        $postuladosVacante = 0;

        foreach ($postulaciones as $postulacion) {
            $postuladosVacante = $postuladosVacante + 1;
        }

        return view('vacante.show', [
            'vacante' => $id,
            'empresa' => $empresa, 'educaciones' => $educaciones, 'postulados' => $postuladosVacante
        ]);
    }
    // --------------------------------------------------------------


    // ------------------------ METODO EDIT -------------------------
    public function edit(Vacante $id, Empresa $empresa)
    {
        $cargos = Cargo::all();
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('vacante.edit', [
            'empresa' => $empresa,
            'cargos' => $cargos, 'paises' => $paises,
            'departamentos' => $departamentos, 'municipios' => $municipios,
            'vacante' => $id
        ]);
    }
    // --------------------------------------------------------------


    // ----------------------- METODO UPDATE ------------------------
    // Al llamar el metodo updata se hace la actualizacion que haya en
    // los campos relacionados a la tabla vacantes, re realiza la validacion
    // desde el controlador para usar la clase Rule con el metodo estatico
    // unique, y seguido de este usar el metodo ignore() para ignorar
    // la validacion unica que se encuantra en el metodo store y la que
    // se asigno como tipo de dato en la migracion, seguido de esto se
    // hace el cambio del valor de los campos que hayan en la tabla
    // vacantes con la que se ingreso en el formulario y se salva (save())
    public function update(Request $request, Vacante $id, Empresa $empresa)
    {
        $request->validate([
            'codigo' => [
                'required',
                Rule::unique('vacantes')->ignore($id->id),
                'min:8',
                'max:8',
            ],
            'num_vacante' => 'required|min:1',
            'meses_experiencia' => 'min:1',
            'salario' => 'required',
        ], [
            'codigo.required' => 'Obligatorio',
            'codigo.unique' => 'Ya existe',
            'codigo.min' => 'Mínimo 8',
            'codigo.max' => 'Máximo 8',
            'num_vacante.required' => 'Obligatorio',
            'num_vacante.min' => 'Mínimo 1',
            'meses_experiencia.min' => 'Mínimo 1',
            'salario.required' => 'Obligatorio',
            'puntos.required' => 'Obligatorio',
        ]);

        $id->codigo = $request->codigo;
        $id->num_vacante = $request->num_vacante;
        $id->meses_experiencia = $request->meses_experiencia;
        $id->salario = $request->salario;
        $id->tipo_salario = $request->tipo_salario;
        $id->tipo_contrato = $request->tipo_contrato;
        $id->tipo_jornada = $request->tipo_jornada;
        $id->empresa_id = $request->empresa_id;
        $id->cargo_id = $request->cargo_id;
        $id->municipio_id = $request->municipio_id;

        $id->save();
        return redirect()->route('vacante.index', $empresa->id);
    }
    // --------------------------------------------------------------


    // ----------------------- METODO DESTROY ------------------------
    // Al llamar el metodo destroy se busca la vacante con el tipo de
    // id correspondiente y al encontrar el registro este se eliminara
    // gracias al metodo delete
    public function destroy(Vacante $id)
    {
        $id->delete();
        return redirect()->back();
    }
    // --------------------------------------------------------------


    // ------------------------ METODO ESTADO -----------------------
    public function estado($id)
    {
        $vacante = Vacante::find($id);
        if ($vacante->estado == 0) {
            $vacante->estado = 1;
        } else {
            $vacante->estado = 0;
        }
        $vacante->save();

        return redirect()->route('reclutador.index');
    }
    // --------------------------------------------------------------
}
