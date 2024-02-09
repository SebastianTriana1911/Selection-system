<?php

namespace App\Http\Controllers;

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
}
