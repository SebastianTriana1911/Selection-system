<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Empresa;
use App\Models\Funcion;
use App\Models\Municipio;
use App\Models\Reclutador;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclutadorController extends Controller{

    // ---------------------- METODO INDEX EMPRESA ---------------------
    // AL llamar el metodo index se realizara una validacion para saber 
    // si el reclutador ya pertenece a una empresa, si este no es el caso
    // lo debera retornar a la vista que contiene la informacion para
    // postularse o crear una empresa
    public function index(){
        // Para hayar algun campo que corresponda al usuario autenticado
        // se hace la validacion de quien este autenticado para mostrar
        // dicho usuario con el campo correspondiente en la vista
        $reclutador = Auth::user();
        
        // Se hace la validacion accediendo al usuario autenticado, luego
        // accediendo a la tabla reclutador y validando si el campo empresa_id
        // es null para hacer que se postule o cree una empresa por medio de
        // una vista
        if($reclutador->reclutador->empresa_id == null){
            return view('reclutador.index', ['reclutador' => $reclutador]);
        }
        else {
            // Se desea acceder al nombre de la empresa asi que se accede al
            // usuario autenticado a la tabla reclutadores como hay una
            // relacion entre reclutadores y empresas accedemos a la tabla
            // empresas y ya aqui accederemos la campo nombre para mostrarlo
            $empresa = $reclutador->reclutador->empresa->nombre;

            // A una variable llamada empresaId se le asigna el id de la 
            // empresa a la cual el reclutador esta postulado para asi
            // mostrar los datos de esa empresa en una vista, se necesita
            // el id de dicha empresa para acceder a ese registro unicamente
            $empresaId = $reclutador->reclutador->empresa->id;

            return view('reclutador.home', ['reclutador' => $reclutador,
            'empresa' => $empresa, 'empresaId' => $empresaId]);
        }
    }
    // -----------------------------------------------------------------


    // ---------------------- METODO CREATE EMPRESA --------------------
    public function createEmpresa(){
        // Al llamar el metodo createEmpresa mostraremos la vista
        // la cual contiene el formulario para crear una empresa o
        // si desea poder postularse a una empresa ya creada, como
        // dicha empresa tiene el campo Pais, Departamento y
        // Municipio y dichos campos estan relacionadas a tablas 
        // con registros previamente insertados, para mostrarlos
        // por medio de un select en la vista llamamos el modelo
        // que apunta a la tabla de cada una de ellas con el metodo
        // estatico all() para que pueda iterar cada uno de los
        // registros por medio de un foreach 
        $paises = Pais::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        // Se retorna la vista que contiene el formulario y se le
        // asignan las variables que contienen todos los registros de
        // las tablas ya mencionadas para que las itere
        return view('reclutador.crearEmpresa', ['paises' => $paises, 
        'departamentos' => $departamentos,
        'municipios' => $municipios]);
    }
    // -----------------------------------------------------------------

    public function postulacion(Empresa $empresa){
        $user = Auth::user();
        $reclutador = $user -> reclutador;
        $reclutador -> empresa_id = $empresa ->id;
        $reclutador -> save();

        return redirect()->route('reclutador.index');
    }

    // -------------- METODO DESVINCULAR DE UNA EMPRESA ----------------
    public function desvincular($id){
        // El metodo desvincular funciona accediendo al usuario autenticado
        // y accediendo al metodo reclutador que en este caso es el usuario
        // autenticado, para acceder al campo empresa_id y asi poner dicho
        // campo en nulo para asi desvincular dicho reclutador de alguna 
        // empresa 
        // Se desea que cuando solo haya una persona vinculada a la empresa
        // y esta desee desvincularse la empresa se elimine, para que esto 
        // suceda se accede al usuario autenticado en el campo empresa_id
        // se itera todos los registros de la tabla reclutador en el campo
        // empresa_id para validar si es el mismo id que el de el usuario
        // autenticado, si ninguno de los reclutadores tiene el mismo empresa_id
        // que tiene el usuario autenticado, dicho usuario se le pasara dicho
        // campo a nulo para asi proceder a eliminar la empresa, de lo contrario
        // solo se pasara el campo a nulo
        
        $user = Auth::user();
        $empresa = Empresa::find($id);
        $reclutadores = Reclutador::all();
        $usuarioAutenticado = $user -> reclutador;

        
        $contador = 0;
        foreach($reclutadores as $reclutador){
            if($reclutador -> empresa_id == $usuarioAutenticado -> empresa_id){
                $contador = $contador + 1;
            }else{
                continue;
            }
        }

        if($contador == 1){
            $usuarioAutenticado -> empresa_id = null;
            $usuarioAutenticado -> save();
            $empresa -> delete();
            return redirect()->route('reclutador.index');

        }else{
            $usuarioAutenticado -> empresa_id = null;
            $usuarioAutenticado -> save();
            return redirect()->route('reclutador.index');
        }
    }
    // -----------------------------------------------------------------

    public function buscar(Request $request){
        $busqueda = $request -> busqueda;
        $contador = 0;
        
        $resultado = Reclutador::whereHas('empresa', function ($query) use ($busqueda){
            $query->where('nombre', 'like', '%'.$busqueda.'%');
        })->get();
        $encontrado = $resultado -> isNotEmpty();

        if ($encontrado == 0){
            return redirect()->route('empresa.index');
        }else{
            foreach ($resultado as $resul){
                $contador = $contador + 1;
            }
            return view('empresa.resultado', ['resultado' => $resultado,
            'contador' => $contador]);
        }
    }
    
    public function create(){
        
    }

    public function store(Request $request){
        
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
