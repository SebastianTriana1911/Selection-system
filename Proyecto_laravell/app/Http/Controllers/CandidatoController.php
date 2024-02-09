<?php
// El controlador CandidatoController corresponde a el CRUD que
// podra realizar un candidato dentro de la pagina web

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacante;
use App\Models\Candidato;
use App\Models\Profesion;
use App\Models\Postulacion;
use Illuminate\Http\Request;
use App\Models\CandidatoEducacion;
use App\Models\CandidatoExperiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCandidato;
use App\Models\CandidatoDesvinculacion;
use Illuminate\Validation\Rule;

class CandidatoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $candidato =  $user->candidato;
        $estadoCandidato = '';

        $estado = $candidato->postulacion;
        if (count($estado)) {
            $estadoCandidato = 'En proceso';
            // Me retornara la vista en la que no puede postularse a ninguna otra vacante

            return 5;
        } else {
            $estadoCandidato = 'Disponible';
            $desvinculaciones = $candidato->candidatoDesvinculacion;

            return view('candidato.index', [
                'candidato' => $candidato, 'desvinculaciones' => $desvinculaciones,
                'estadoCandidato' => $estadoCandidato
            ]);
        }

        // RECORDATORIO: TOCA HACER LA VALIDACION DONDE SE COMPRUEBE SI EL CANDIDATO A SIDO SELECCIONADO
    }

    // -------------------- METODO STORE ------------------------
    public function store(StoreCandidato $request)
    {
        // Al llamar el metodo store se instanciara un objeto de
        // la clase usuario y se llaman los campos correspondiente
        // a dicha tabla

        // Instancia de Usuario
        $user = new User();
        $user->num_documento = $request->num_documento;
        $user->tipo_documento = $request->tipo_documento;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->genero = $request->genero;
        $user->estado_civil = $request->estado_civil;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->municipio_id = $request->municipio_id;
        $user->role_id = $request->role_id;
        $user->save();

        // Ya creador y subido los datos a la tabla Users se instancia
        // un objeto de la tabla candidato para subir los datos a los
        // campos correspondientes de los candidatos
        // Instancia de Candidato
        $candidato = new Candidato();
        $candidato->fecha_nacimiento = $request->fecha_nacimiento;
        $candidato->direccion = $request->direccion;
        $candidato->telefono = $request->telefono;
        $candidato->perfil_ocupacional = $request->perfil_ocupacional;
        $candidato->user_id = $user->id;
        $candidato->save();

        // Se hace una redireccion al login para que el candidato
        // se autentique
        return redirect()->route('login');
    }
    // ----------------------------------------------------------

    public function hojavida(string $id){
        $candidato = Candidato::find($id);

        $sexo = "";
        if ($candidato->user->genero == 'Masculino') {
            $sexo = '/imagenes/icono-hombre.png';
        } else {
            $sexo = '/imagenes/icono-mujer.png';
        }

        $candidatoEducacion = [];
        $educaciones = CandidatoEducacion::all();
        foreach ($educaciones as $educacion) {
            if ($educacion->candidato_id == $id) {
                array_push($candidatoEducacion, $educacion);

            } else {
                continue;
            }
        }

        $candidatoExperiencia = [];
        $experiencias = CandidatoExperiencia::all();
        foreach ($experiencias as $experiencia) {
            if ($experiencia->candidato_id == $id) {
                array_push($candidatoExperiencia, $experiencia);
            } else {
                continue;
            }
        }

        return view('candidato.hojavida', [
            'candidato' => $candidato, 'sexo' => $sexo,
            'candidatoEducacion' => $candidatoEducacion, 'candidatoExperiencia' => $candidatoExperiencia
        ]);
    }

    public function edit(string $id)
    {
        $candidato = Candidato::find($id);
        return view('candidato.edit', ['candidato' => $candidato]);
    }

    public function update(Request $request, string $id)
    {
        $candidato = Candidato::find($id);
        $user = User::find($candidato->user_id);

        $rule = $candidato->user->id;

        $request->validate([
            'direccion' => 'required|min:7',
            'fecha_nacimiento' => 'required|after:1975-01-01',
            'telefono' => 'required|min:10|max:10',
            'perfil_ocupacional' => 'required|min:10',
            'num_documento' => [
                'required',
                'max:11',
                'min:7',
                Rule::unique('users')->ignore($rule),
            ],
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'email' => [
                'required',
                'email',
                'min:10',
                Rule::unique('users')->ignore($rule),
            ]
        ], [
            'direccion.min' => 'Minimo 7 caracteres',
            'direccion.required' => 'Este campo es obligatorio',
            'fecha_nacimiento.after' => 'Debe ser superior a 1975-01-01',
            'fecha_nacimiento.required' => 'Este campo es obligatorio',
            'telefono.required' => 'Este campo es obligatorio',
            'telefono.min' => 'Debe ser como minimo 10 numeros',
            'telefono.max' => 'Debe ser como maximo 10 numeros',
            'perfil_ocupacional' => 'Este campo es obligatorio',
            'perfil_ocupacional' => 'Debe de tener como minumo 10 caracteres',
            'nun_documento.required' => 'Este campo es obligatorio',
            'num_documento.max' => 'Maximo 11 caracteres',
            'num_documento.min' => 'Minimo 7 caracteres',
            'num_documento.unique' => 'Ya existe este numero de documento',
            'nombre.required' => 'Este campo es obligatorio',
            'nombre.min' => 'Minimo 3 caracteres',
            'apellido.required' => 'Este campo es obligatorio',
            'apellido.min' => 'Minimo 3 caracteres',
            'email.required' => 'Este campo es obligatorio',
            'email.email' => 'Este campo debe ser un correo valido',
            'email.min' => 'Minimo 10 caracteres',
            'email.unique' => 'El email ya existe'
        ]);

        $candidato->direccion = $request->direccion;
        $candidato->fecha_nacimiento = $request->fecha_nacimiento;
        $candidato->telefono = $request->telefono;
        $candidato->perfil_ocupacional = $request->perfil_ocupacional;
        $candidato->save();

        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->genero = $request->genero;
        $user->estado_civil = $request->estado_civil;
        if($user->email == $request -> email){
            $user->save();
            return redirect()->route('candidato.index');
        }else{
            $user->email = $request->email;
            $user->save();
            return redirect()->route('login');
        }
    }

    public function destroy(string $id){
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('welcome');
    }
}
