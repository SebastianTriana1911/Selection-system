<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profesion;
use App\Models\Instructor;
use Illuminate\Http\Request;

class ProfesionController extends Controller{
    public function create($idInstructor, $idUsuario){
        $usuario = User::find($idUsuario);
        $instructor = Instructor::where('user_id', $idUsuario)->get();
        $profesiones = Profesion::where('instructor_id', $idInstructor)->get();
        
        $titulo = "";
        $titulo2 = "";
        if ($usuario->genero == 'Masculino'){
            $titulo = "Formulario de profesiones para el instructor $usuario->nombre";
            $titulo2 = "Profesiones del instructor $usuario->nombre";
        }else{
            $titulo = "Formulario de profesiones para la instructora $usuario->nombre";
            $titulo2 = "Profesiones de la instructura $usuario->nombre";
        }

        return view('profesion.create', ['titulo' => $titulo, 'usuario' => $usuario,
        'instructor' => $instructor, 'profesiones' => $profesiones, 'titulo2' => $titulo2,
        'idInstructor' => $idInstructor]);
    }

    public function store(Request $request, $id){
        $profesion = new Profesion();

        $profesion -> titulado = $request -> titulado;
        $profesion -> institucion = $request -> institucion;
        $profesion -> instructor_id = $id;
        if ($request->hasFile('documento')){
            $documento = $request->file('documento');
            $ruta = $documento->store('documentos', 'public');
            $profesion -> documento = $ruta;
            $profesion -> save();
            return redirect()->back();

        // Si la condicional da que no se a subido ningun archivo entonces ese
        // campo quedara como nulo
        }else {
            $profesion -> documento = null;
            $profesion -> save();        
            return redirect()->back();
        }
    }

    public function show(string $id){
        
    }

    public function edit(string $id){
        
    }

    public function update(Request $request, string $id){
        
    }

    public function destroy(string $id){
        $profesion = Profesion::find($id);
        $profesion->delete();
        return redirect()->back();
    }
}
