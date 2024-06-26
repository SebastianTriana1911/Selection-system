<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Funcion;
use App\Models\Vacante;
use App\Models\Candidato;
use App\Models\Postulacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PonderacionEntrevista;
use App\Models\PonderacionEntrevistaTecnica;
use App\Models\PonderacionEntrevistaPsicologica;

class SeleccionadorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $seleccionador = $user->seleccionador;

        if ($seleccionador->empresa_id == null) {
            $empresas = Empresa::all();

            $cantidadEmpresas = 0;
            foreach ($empresas as $empresa) {
                $cantidadEmpresas = $cantidadEmpresas + 1;
            }

            return view('seleccionador.vincular', ['empresas' => $empresas, 'cantidad' => $cantidadEmpresas]);
        } else {
            $user = Auth::user();
            $seleccionador = $user->seleccionador;

            $empresa = $seleccionador->empresa;
            return view('seleccionador.index', ['seleccionador' => $seleccionador, 'empresa' => $empresa]);
        }
    }

    public function vincular($id)
    {
        $user = Auth::user();
        $seleccionador = $user->seleccionador;

        $seleccionador->empresa_id = $id;
        $seleccionador->save();

        return redirect()->route('seleccionador.index');
    }

    public function desvincular()
    {
        $user = Auth::user();
        $seleccionador = $user->seleccionador;

        $seleccionador->empresa_id = null;
        $seleccionador->save();

        return redirect()->route('seleccionador.index');
    }

    public function showEmpresa()
    {
        $user = Auth::user();
        $seleccionador = $user->seleccionador;
        $empresa = $seleccionador->empresa;

        $reclutadores = 0;
        foreach ($empresa->reclutador as $reclutador) {
            $reclutadores = $reclutadores + 1;
        }

        $seleccionadores = 0;
        foreach ($empresa->seleccionador as $selecc) {
            $seleccionadores = $seleccionadores + 1;
        }

        return view('seleccionador.showEmpresa', [
            'empresa' => $empresa,
            'reclutadores' => $reclutadores, 'seleccionadores' => $seleccionadores
        ]);
    }

    public function vacantes()
    {
        $user = Auth::user();
        $seleccionador = $user->seleccionador;
        $empresa = Empresa::find($seleccionador->empresa_id);
        // Ordena de manera descente
        $vacantes = $empresa->vacante()->latest('created_at')->get();
        $cantidad = 0;
        foreach ($vacantes as $vacante) {
            $cantidad = $cantidad + 1;
        }

        return view('seleccionador.vacantes', [
            'cantidad' => $cantidad,
            'empresa' => $empresa, 'vacantes' => $vacantes
        ]);
    }

    public function candidatosPostulados($id)
    {
        $vacante = Vacante::find($id);
        $cantidad = 0;
        foreach ($vacante->postulacion as $post) {
            $cantidad = $cantidad + 1;
        }

        $vacantes = $vacante->postulacion()
            ->join('ponderacion_totales', 'postulaciones.id', '=', 'ponderacion_totales.postulacion_id') // Hacer un join con la tabla ponderaciones
            ->select('postulaciones.*') // Seleccionar los campos de postulaciones
            ->orderByDesc('ponderacion_totales.ponderacion') // Ordenar por la ponderacion de manera descendente
            ->get();

        return view('seleccionador.postulados', ['cantidad' => $cantidad, 'vacantes' => $vacantes]);
    }

    public function datosPostulacion($idPostulacion){
        $postulacion = Postulacion::find($idPostulacion);
        $funciones = $postulacion->vacante->cargo->ocupacion->funcion;
        $educaciones = $postulacion->vacante->educacionVacante;

        $candidato = Candidato::find($postulacion->candidato->id);


        $candidatoEducacion = $candidato->candidatoEducacion;
        $candidatoExperiencia = $candidato->candidatoExperiencia;

        return view('seleccionador.datosPostulacion', ['postulacion' => $postulacion,
        'funciones' => $funciones, 'educaciones' => $educaciones, 'candidato' => $candidato, 'candidatoEducacion' => $candidatoEducacion, 'candidatoExperiencia' => $candidatoExperiencia]);
    }

    public function estadoPreseleccionado($idCandidato, $idVacante, $idPostulacion){
        $vacante = Vacante::find($idVacante);
        $candidato = Candidato::find($idCandidato);
        $candidato->estado = 'Preseleccionado';
        $candidato->save();

        $entrevista = new PonderacionEntrevista();
        $entrevista->ponderacion = 0;
        $entrevista->descripcion = null;
        $entrevista->tipo_entrevista_id = 1;
        $entrevista->postulacion_id = $idPostulacion;
        $entrevista->save();

        $entrevistaTecnica = new PonderacionEntrevistaTecnica();
        $entrevistaTecnica->ponderacion = 0;
        $entrevistaTecnica->descripcion = null;
        $entrevistaTecnica->tipo_entrevista_id = 2;
        $entrevistaTecnica->postulacion_id = $idPostulacion;
        $entrevistaTecnica->save();

        $entrevistaPsicologica = new PonderacionEntrevistaPsicologica();
        $entrevistaPsicologica->ponderacion = 0;
        $entrevistaPsicologica->descripcion = null;
        $entrevistaPsicologica->tipo_entrevista_id = 3;
        $entrevistaPsicologica->postulacion_id = $idPostulacion;
        $entrevistaPsicologica->save();


        return redirect()->route('seleccionador.candidatosPostulados', ['id' => $vacante->id]);
    }

    public function ponderar($idPostulacion){
        $postulacion = Postulacion::find($idPostulacion);

        $ponderacionTotal = $postulacion->ponderacionTotal;
        return view('seleccionador.ponderar', ['postulacion' => $postulacion, 'ponderacionTotal' => $ponderacionTotal]);
    }
}
