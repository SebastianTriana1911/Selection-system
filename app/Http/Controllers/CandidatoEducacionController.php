<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatoEducacion;
use App\Http\Requests\UpdateCandidatoEducacion;
use App\Models\CandidatoEducacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CandidatoEducacionController extends Controller{
    public function index(){
        $user = Auth::user();
        $candidato = $user->candidato;
        $titulo = '';

        if($user->genero == 'Masculino'){
            $titulo = 'Señor';
        }else{
            $titulo = 'Señora';
        }

        $educaciones = $candidato->candidatoEducacion;


        return view('candidatoEducacion.index', ['titulo' => $titulo, 
        'candidato' => $candidato, 'educaciones' => $educaciones]);
    }


    public function store(StoreCandidatoEducacion $request, $id){
        $candidatoEducacion = new CandidatoEducacion();
        $candidatoEducacion -> nivel_estudio = $request -> nivel_estudio;
        $candidatoEducacion -> institucion = $request -> institucion;
        $candidatoEducacion -> titulado = $request -> titulado;
        $candidatoEducacion -> año_inicio = $request -> año_inicio;
        $candidatoEducacion -> año_finalizacion = $request -> año_finalizacion;
        $candidatoEducacion -> candidato_id = $id;

        if ($request->hasFile('documento')){
            $documento = $request->file('documento');
            $ruta = $documento->store('documentos', 'public');
            $candidatoEducacion -> documento = $ruta;
            $candidatoEducacion -> save();
            return redirect()->back();

        // Si la condicional da que no se a subido ningun archivo entonces ese
        // campo quedara como nulo
        }else {
            $candidatoEducacion -> documento = null;
            $candidatoEducacion -> save();        
            return redirect()->back();
        }
    }


    public function edit($id){
        $candidatoEducacion = CandidatoEducacion::find($id);
        $user = Auth::user();
        $candidato = $user->candidato;

        return view('candidatoEducacion.edit', ['candidatoEducacion' => $candidatoEducacion, 
        'candidato' => $candidato]);
    }


    public function update(UpdateCandidatoEducacion $request, $id){
        $candidatoEducacion = CandidatoEducacion::find($id);

        $candidatoEducacion -> nivel_estudio = $request -> nivel_estudio;
        $candidatoEducacion -> institucion = $request -> institucion;
        $candidatoEducacion -> titulado = $request -> titulado;
        $candidatoEducacion -> año_inicio = $request -> año_inicio;
        $candidatoEducacion -> año_finalizacion = $request -> año_finalizacion;
        
        if($request->documento != null){
            if ($request->hasFile('documento')){
                $documento = $request->file('documento');
                $ruta = $documento->store('documentos', 'public');
                $candidatoEducacion -> documento = $ruta;
                $candidatoEducacion -> save();
                return redirect()->back();
            }
        }

        $candidatoEducacion -> save();
        return redirect()->back();
    }

    public function destroy($id){
        $candidatoEducacion = CandidatoEducacion::find($id);
        $candidatoEducacion->delete();

        return redirect()->back();
    }
}
