<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CandidatoEducacionController extends Controller{
    public function index(){
        $user = Auth::user();
        $candidato = $user->candidato;

        return view('candidatoEducacion.index');
    }
}
