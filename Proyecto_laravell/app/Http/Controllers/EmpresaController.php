<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Role;
use App\Models\Empresa;
use App\Models\Municipio;
use App\Models\Reclutador;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreEmpresa;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller{
    public function index(){
        $empresas = Empresa::all();
        $contador = 0;

        foreach($empresas as $empresa){
            $contador = $contador + 1;
        }

        return view('empresa.index', ['empresas' => $empresas, 'contador' => $contador]);
    }

    public function create(){
        
    }

    // ---------------------- METODO STORE -------------------------
    public function store(StoreEmpresa $request){
        // Al llamar el metodo store significa que se creara un
        // nuevo regitro de la tabla empresas, como la empresa 
        // la crea un reclutador y esta esta asociada a este,
        // primero deberemos de crear el registro de la empresa
        // para mas adelante ocupara el campo id de dicho registro
        $empresa = new Empresa();

        $empresa -> nit = $request -> nit;
        $empresa -> nombre = $request -> nombre;
        $empresa -> direccion = $request -> direccion;
        $empresa -> municipio_id = $request -> municipio_id;
        $empresa -> save();

        // Accedemos al usuario autenticado, en este caso
        // recuperaremos el registro de la tabla users a la que
        // pertenese el reclutador autenticado
        $user = Auth::user();

        // Se hace la busqueda del registro de la tabla reclutadores
        // por medio de la relacion que hay entre la tabla users y
        // la tabla reclutadores. Pues accederemos al registro de la
        // tabla users a la que pertenece el reclutador ya autenticado
        // y se le asigna la relacion que en este caso sera con la
        // relacion del reclutador, esto quiere decir que buscaremos
        // el campo foraneo de la tabla reclutadores donde coinsida con
        // el campo autenticado de la tabla users
        $reclutador = $user->reclutador;

        // Ya accedido al registro del reclutador autenticado, accedemos
        // al campo empresa_id que se encuentra en null y le asociamos la
        // variable que contiene la empresa creada en el campo id
        $reclutador -> empresa_id = $empresa -> id;
        $reclutador -> save();
        
        return redirect()->route('reclutador.index');
    }
    // -------------------------------------------------------------


    // ---------------------- METODO SHOW --------------------------
    public function show(string $id){
        // AL llamar el metodo show se mostrara todos los datos de la
        // empresa que cuyo id corresponda al que se pasa por parametro
        // en una vista, por eso se utiliza el metodo estatico find para
        // recuperar todos los datos de dicha empresa
        $empresa = Empresa::find($id);

        // Como se desea saber cuantos reclutadores hay en la empresa
        // se llama al modelo reclutador con el metodo estatico all para
        // que me muestre por medio de arrays todos los datos de dicha tabla
        $reclutador = Reclutador::all();

        // Se itera todas los registros y se valida si el campo empresa_id 
        // es igual al campo id de la tabla empresas si esto es true 
        // significa que el reclutador pertenece a dicha empresa por 
        // consigiente a una variable contador se va sumando su valor mas uno
        // para poder encontrar cuantos reclutadores hay en dicha empresa
        $contador = 0;
        foreach($reclutador as $recluta){
            if ($recluta -> empresa_id == $empresa -> id){
                $contador = $contador + 1;
            }else {
                continue;
            }
        }

        $contadorSeleccionadores = 0;
        foreach($empresa->seleccionador as $seleccionador){
            $contadorSeleccionadores = $contadorSeleccionadores + 1; 
        }

        return view('empresa.show', ['empresa' => $empresa, 
        'contador' => $contador, 'contadorSeleccionadores' => $contadorSeleccionadores]);
    }
    // -------------------------------------------------------------


    // ---------------------- METODO EDIT ---------------------------
    // AL llamar el metodo edit se retornara una vista con un formulario
    // para actualizar los datos de dicha empresa que se pasa por
    // parametro del metodo y se llama el registro por el metodo estatico
    // find
    public function edit($id){   
        $empresa = Empresa::find($id);

        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('empresa.edit', ['empresa' => $empresa,
        'paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }
    // -------------------------------------------------------------


    // ---------------------- METODO UPDATE--------------------------
    // Al llamar el metodo update recolecta los datos que encontro el
    // formulario de la vista edit para luego llamar dichos datos y
    // por el metodo update actualizarlos en la base de datos
    public function update(Request $request, string $id){
        $empresa = Empresa::find($id);
        $request->validate([
            'nit' => [
                'required',
                Rule::unique('empresas')->ignore($empresa->id),
            ],
            'nombre' => 'required',
            'direccion' => 'required',
            'municipio_id' => 'required'
        ], [
            'nit.required' => 'Obligatorio',
            'nit.unique' => 'Ya existe',
            'nombre.required' => 'Obligatorio',
            'direccion.required' => 'Obligatorio',
            'minicipio_id.required' => 'Obligatorio'
        ]);
        $empresa->update($request->all());

        return redirect()->route('empresa.show', $empresa -> id);
    }
    // --------------------------------------------------------------


    // ---------------------- METODO DESTROY ------------------------
    // Al llamar el metodo destroy se le asigna como parametro en este
    // caso el id de la empresa que se desea eliminar, para que no haya
    // un error entre los reclutadores que se encuentran en dicha empresa
    // se empieza iterar todos los registros de la tabla reclutadores
    // por medio de un foreach gracias al metodo estatico all que se le 
    // asigna al modelo Reclutador, dentro del foreach se hace la validacion
    // de los reclutadores donde la empresa consifa con la variable
    // empresa en el campo id y si ficha validacion coincide se le
    // cambia el campo empresa_id a nulo para posteriormete eliminar
    // dicha empresa
    public function destroy(string $id){
        $reclutadores = Reclutador::all();
        $empresa = Empresa::find($id);

        foreach($reclutadores as $reclutador){
            if($reclutador -> empresa_id = $empresa -> id){
                $reclutador -> empresa_id = null;
                $reclutador -> save();
            }
        }

        $empresa ->delete();
        return redirect()->route('reclutador.index');
    }
    // -------------------------------------------------------------
}
