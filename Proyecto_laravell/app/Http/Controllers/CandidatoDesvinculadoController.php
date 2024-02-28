<?php

namespace App\Http\Controllers;

use App\Models\CandidatoDesvinculacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatoDesvinculadoController extends Controller{
    public function show($id){
        $user = Auth::user();
        $candidato = $user->candidato;

        $desvinculacion = CandidatoDesvinculacion::find($id);

        return view('desvinculacion.show', ['candidato' => $candidato,
        'desvinculacion' => $desvinculacion]);
    }
}
