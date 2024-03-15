<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Vacante;
use App\Models\Postulacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeleccionadorController extends Controller
{
    public function index(){
        $user = Auth::user();
        $seleccionador = $user->seleccionador;

        if($seleccionador->empresa_id == null){
            $empresas = Empresa::all();

            $cantidadEmpresas = 0;
            foreach ($empresas as $empresa){
                $cantidadEmpresas = $cantidadEmpresas + 1;
            }

            return view('seleccionador.vincular', ['empresas' => $empresas, 'cantidad' => $cantidadEmpresas]);
        }else{
            $user = Auth::user();
            $seleccionador = $user->seleccionador;

            $empresa = $seleccionador -> empresa;
            return view('seleccionador.index', ['seleccionador' => $seleccionador, 'empresa' => $empresa]);
        }
    }

    public function vincular($id){
        $user = Auth::user();
        $seleccionador = $user->seleccionador;

        $seleccionador -> empresa_id = $id;
        $seleccionador->save();

        return redirect()->route('seleccionador.index');
    }

    public function desvincular(){
        $user = Auth::user();
        $seleccionador = $user -> seleccionador;

        $seleccionador -> empresa_id = null;
        $seleccionador -> save();

        return redirect()->route('seleccionador.index');
    }

    public function showEmpresa(){
        $user = Auth::user();
        $seleccionador = $user -> seleccionador;
        $empresa = $seleccionador->empresa;

        $reclutadores = 0;
        foreach($empresa->reclutador as $reclutador){
            $reclutadores = $reclutadores + 1;
        }

        $seleccionadores = 0;
        foreach($empresa->seleccionador as $selecc){
            $seleccionadores = $seleccionadores + 1;
        }

        return view('seleccionador.showEmpresa', ['empresa' => $empresa, 
        'reclutadores' => $reclutadores, 'seleccionadores' => $seleccionadores]);
    }

    public function vacantes(){
        $user = Auth::user();
        $seleccionador = $user -> seleccionador;
        $empresa = Empresa::find($seleccionador->empresa_id);
        // Ordena de manera descente
        $vacantes = $empresa->vacante()->latest('created_at')->get();
        $cantidad = 0;
        foreach($vacantes as $vacante){
            $cantidad = $cantidad + 1;
        }

        return view('seleccionador.vacantes', ['cantidad' => $cantidad,
        'empresa' => $empresa, 'vacantes' => $vacantes]);
    }

    public function candidatosPostulados($id){
        $vacante = Vacante::find($id);
        $cantidad = 0;
        foreach($vacante->postulacion as $post){
            $cantidad = $cantidad + 1;
        }

        $vacantes = $vacante->postulacion()->latest('created_at')->get();

        return view('seleccionador.postulados', ['cantidad' => $cantidad, 'vacantes' => $vacantes]);
    }
}
