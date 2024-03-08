<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profesion;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfesion;
use App\Http\Requests\UpdateProfesion;
use Illuminate\Support\Facades\Storage;

class ProfesionController extends Controller
{
    public function create($idInstructor, $idUsuario)
    {
        $usuario = User::find($idUsuario);
        $instructor = Instructor::where('user_id', $idUsuario)->get();
        $profesiones = Profesion::where('instructor_id', $idInstructor)->get();

        $titulo = "";
        $titulo2 = "";
        if ($usuario->genero == 'Masculino') {
            $titulo = "Formulario de profesiones para el instructor";
            $titulo2 = "Profesiones del instructor";
        } else {
            $titulo = "Formulario de profesiones para la instructora";
            $titulo2 = "Profesiones de la instructura";
        }

        return view('profesion.create', [
            'titulo' => $titulo, 'usuario' => $usuario,
            'instructor' => $instructor, 'profesiones' => $profesiones, 'titulo2' => $titulo2,
            'idInstructor' => $idInstructor, 'idUsuario' => $idUsuario
        ]);
    }

    public function store(StoreProfesion $request, $id)
    {
        $profesion = new Profesion();

        $profesion->titulado = $request->titulado;
        $profesion->institucion = $request->institucion;
        $profesion->instructor_id = $id;
        if ($request->hasFile('documento')) {
            $documento = $request->file('documento');
            $documentoNombre = $documento->getClientOriginalName();
            $documento->storeAs('public', $documentoNombre);
            $ruta = 'storage/' . $documentoNombre;
            $profesion->documento = $ruta;
            $profesion->save();
            return redirect()->back();

            // Si la condicional da que no se a subido ningun archivo entonces ese
            // campo quedara como nulo
        } else {
            $profesion->documento = null;
            $profesion->save();
            return redirect()->back();
        }
    }

    public function edit(string $id, $idInstructor, $idUsuario)
    {
        $profesion = Profesion::find($id);
        $instructor = Instructor::find($idInstructor);
        $nombreInstructor = $instructor->user->nombre;

        $titulo = "";
        if ($instructor->user->genero == 'Masculino') {
            $titulo = "Formulario para actualizar profesion del instructor";
        } else {
            $titulo = "Formulario para actualizar profesion de la instructora";
        }

        return view('profesion.edit', [
            'profesion' => $profesion, 'titulo' => $titulo,
            'idInstructor' => $idInstructor, 'idUsuario' => $idUsuario
        ]);
    }

    public function update(UpdateProfesion $request, string $id)
    {
        $profesion = Profesion::find($id);

        $profesion->titulado = $request->titulado;
        $profesion->institucion = $request->institucion;
        if ($profesion->documento != $request->documento) {
            $urlOriginal = $profesion->documento;
            $parteEliminar = 'storage/';
            // Accedo a la ruta sin el storage que habia concatenado a la hora de subir el archivo
            $urlModificada = str_replace($parteEliminar, '', $urlOriginal);
            // Ruta relativa al enlace simbólico creado por Laravel
            $rutaArchivo = 'public/' . $urlModificada;
            $rutaArchivoCodificada = rawurldecode($rutaArchivo);            
            Storage::delete($rutaArchivo);
            if ($request->hasFile('documento')) {
                $documento = $request->file('documento');
                $documentoNombre = $documento->getClientOriginalName();
                $documento->storeAs('public', $documentoNombre);
                $ruta = 'storage/' . $documentoNombre;
                $profesion->documento = $ruta;
                $profesion->save();
                return redirect()->back();
            } else {
                $profesion->documento = null;
                $profesion->save();
                return redirect()->back();
            }
        } else {
            $profesion->save();
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        $profesion = Profesion::find($id);
        $profesion->delete();
        return redirect()->back();
    }
}
