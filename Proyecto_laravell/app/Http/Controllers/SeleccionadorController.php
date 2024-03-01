<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
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
}
