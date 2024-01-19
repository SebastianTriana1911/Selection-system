<?php
// El controlador EducacionVacanteController hace referencia a
// la educacion que requiere alguna de las vacantes echas por
// un reclutador relacionadas a la empresa a la que este 
// pertenezca

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducacionVacante;
use App\Http\Requests\UpdateEducacionVacante;
use App\Models\EducacionVacante;
use App\Models\Empresa;
use App\Models\Vacante;
use Illuminate\Http\Request;

class EducacionVacanteController extends Controller{
    // ---------------------- CREATE -------------------------
    // Al llamar el metodo create se retorna una vista con 
    // variables como la empresa ya que a la hora de retroseder
    // de vista se necesitra pasar la empresa en la que se esta 
    // como parametro en una de las rutas, y la variable vacante
    // ya que esta esta vinculada a las nuevas educaciones que
    // se van a incorporar para la vacante que se le pase por
    // parametro
    public function create(Vacante $vacante, Empresa $empresa){
        $educaciones = $vacante -> educacionVacante;

        return view('educacionVacante.create', ['educaciones' => $educaciones,
        'empresa' => $empresa, 'vacante' => $vacante]);
    }
    // --------------------------------------------------------


    // ----------------------- STORE ---------------------------
    // Al llamar el metodo store se comprobara si la educacion que
    // se desea crear ya existe para dicha vacante para que no se
    // cree doble vez si la educacion ya existe no le permitira
    // subir nada a la base de datos y si dicha educacion no existe
    // lo dejara subir dicha informacion existosamente
    public function store(StoreEducacionVacante $request, Vacante $vacante){
        $educaciones = $vacante -> educacionVacante;
        $lista = [];

        // Todas las educaciones pertenecientes a la vacante que
        // se este utilizando se insertaran a una lista
        foreach ($educaciones as $educacion){
            if($educacion -> vacante_id == $vacante -> id){
                array_push($lista, $educacion -> nivel_estudio);
            }
        }

        // Se iterara la lista para comprobar si la educacion que
        // se desea subir es igual a las educaciones que ya contiene
        // la vacante
        foreach ($lista as $niveles){
            if ($niveles == $request -> nivel_estudio){
                return redirect()->back();
            }
        }

        // Si no hay ninguna educacion de la lista que coincida con
        // la que se desea crear, se creara la educacion para la
        // vacante exitosamente
        $educacion = new EducacionVacante();
        $educacion -> nivel_estudio = $request -> nivel_estudio;
        $educacion -> puntos = $request -> puntos;
        $educacion -> descripcion = $request -> descripcion;
        $educacion -> vacante_id = $vacante -> id;
        $educacion -> save();

        return redirect()->back();
    }
    // --------------------------------------------------------


    // ----------------------- EDIT ----------------------------
    // Al llamar el metodo edit se retorna una vista con 
    // variables como la empresa ya que a la hora de retroseder
    // de vista se necesitra pasar la empresa en la que se esta 
    // como parametro en una de las rutas, la variable vacante
    // ya que esta esta vinculada a las nuevas educaciones que
    // se van a incorporar para la vacante que se le pase por
    // parametro, y la variable educacion que es la que tendra la
    // informacion de la educacion que se desea actualizar
    public function edit(EducacionVacante $educacion, Vacante $vacante,
    Empresa $empresa){
        return view('educacionVacante.edit', ['educacion' => $educacion,
        'vacante' => $vacante, 'empresa' => $empresa]);
    }
    // ---------------------------------------------------------


    // ---------------------- UPDATE ---------------------------
    // Al llamar el metodo update deberemos de hacer la validacion
    // que hicimos en el caso del metodo store donde comprobamos
    // si el nivel de educacion ya existe o si no existe permita
    // actualizarlo
    public function update(UpdateEducacionVacante $request, Vacante $vacante, 
    EducacionVacante $educacion){
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

        $educacion -> nivel_estudio = $request -> nivel_estudio;
        $educacion -> puntos = $request -> puntos;
        $educacion -> descripcion = $request -> descripcion;
        $educacion -> vacante_id = $vacante -> id;
        $educacion -> save();

        return redirect()->back();
    }
    // ---------------------------------------------------------


    // ---------------------- DESTROY --------------------------
    // El metodo destroy permite eliminar un registro segun su id
    public function destroy(EducacionVacante $id){
        $id -> delete();
        return redirect()->back();
    }
    // ---------------------------------------------------------
}
