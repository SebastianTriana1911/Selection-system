<?php
// El controlador CandidatoController corresponde a el CRUD que
// podra realizar un candidato dentro de la pagina web

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacante;
use App\Models\Candidato;
use App\Models\Profesion;
use App\Models\Ponderacion;
use App\Models\Postulacion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CandidatoEducacion;
use App\Models\CandidatoExperiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCandidato;
use App\Models\CandidatoDesvinculacion;
use Illuminate\Support\Facades\Storage;

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
            $desvinculaciones = $candidato->candidatoDesvinculacion;
            $postulacionFind = '';
            foreach ($candidato->postulacion as $post) {
                $postulacionFind = $post->id;
            }

            $postulacion = Postulacion::find($postulacionFind);
            $cont = 0;

            $postulacionesAll = Postulacion::all();
            foreach ($postulacionesAll as $all) {
                if ($all->vacante_id == $postulacion->vacante_id) {
                    $cont++;
                } else {
                    continue;
                }
            }

            return view('candidato.proceso', [
                'candidato' => $candidato, 'desvinculaciones' => $desvinculaciones,
                'estadoCandidato' => $estadoCandidato, 'postulacion' => $postulacion,
                'cont' => $cont
            ]);
        } else {
            $estadoCandidato = 'Disponible';
            $desvinculaciones = $candidato->candidatoDesvinculacion;

            return view('candidato.index', [
                'candidato' => $candidato, 'desvinculaciones' => $desvinculaciones,
                'estadoCandidato' => $estadoCandidato
            ]);
        }
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


    public function hojavida(string $id)
    {
        $candidato = Candidato::find($id);

        $sexo = "";
        if ($candidato->user->genero == 'Masculino') {
            if ($candidato->avatar != null) {
                $ruta = 'storage/' . $candidato->avatar;
                $sexo = $ruta;
            } else {
                $sexo = '/imagenes/icono-hombre.png';
            }
        } else {
            if ($candidato->avatar != null) {
                $ruta = 'storage/' . $candidato->avatar;
                $sexo = $ruta;
            } else {
                $sexo = '/imagenes/icono-mujer.png';
            }
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
            ],
            'avatar' => 'image|mimes:jpeg,png,jpg',
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
            'email.unique' => 'El email ya existe',
            'avatar.image' => 'Asegure de que sea una imagen'
        ]);

        $candidato->direccion = $request->direccion;
        $candidato->fecha_nacimiento = $request->fecha_nacimiento;
        $candidato->telefono = $request->telefono;
        $candidato->perfil_ocupacional = $request->perfil_ocupacional;

        if ($request->hasFile('avatar')) {
            if ($candidato->avatar == $request->avatar) {
                $documento = $request->file('avatar');
                $documentoNombre = $documento->getClientOriginalName();
                $documento->storeAs('public', $documentoNombre);
                $ruta = $documentoNombre;
                $candidato->avatar = $ruta;
                $candidato->save();
            } else {
                $urlOriginal = $candidato->avatar;
                $rutaArchivo = 'public/' . $urlOriginal;
                $rutaArchivoCodificada = rawurldecode($rutaArchivo);
                Storage::delete($rutaArchivoCodificada);

                $documento = $request->file('avatar');
                $documentoNombre = $documento->getClientOriginalName();
                $documento->storeAs('public', $documentoNombre);
                $ruta = $documentoNombre;
                $candidato->avatar = $ruta;
                $candidato->save();
            };
        }

        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->genero = $request->genero;
        $user->estado_civil = $request->estado_civil;
        if ($user->email == $request->email) {
            $user->save();
            return redirect()->route('candidato.index');
        } else {
            $user->email = $request->email;
            $user->save();
            return redirect()->route('login');
        }
    }


    public function destroyAvatar($id)
    {
        $candidato = Candidato::find($id);

        // Se elimina la imagen que haya en la carpeta storage con la ruta que haya en el campo
        $urlOriginal = $candidato->avatar;
        $rutaArchivo = 'public/' . $urlOriginal;
        $rutaArchivoCodificada = rawurldecode($rutaArchivo);
        Storage::delete($rutaArchivoCodificada);

        $candidato->avatar = null;
        $candidato->save();

        return redirect()->back();
    }


    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('welcome');
    }


    public function showVacantes()
    {
        $vacantes  = Vacante::all();
        $cantidad = 0;

        foreach ($vacantes as $vacante) {
            if ($vacante->estado == 1) {
                $cantidad = $cantidad + 1;
            } else {
                continue;
            }
        }

        return view('candidato.vacantes', ['vacantes' => $vacantes, 'cantidad' => $cantidad]);
    }
    

    public function sintesis($id)
    {
        $user = Auth::user();
        $candidato = $user->candidato;
        $candidatoEducacion = $candidato->candidatoEducacion;
        $candidatoExperiencia = $candidato->candidatoExperiencia;
        $vacante = Vacante::find($id);
        $postulaciones = $vacante->postulacion;
        $candidatosPostulados = 0;
        foreach ($postulaciones as $postulacion) {
            $candidatosPostulados = $candidatosPostulados = 1;
        }

        $funciones = $vacante->cargo->ocupacion->funcion;
        $educaciones = $vacante->educacionVacante;
        $conteoEducacion = count($educaciones);
        $comparacionExitosaNivel = 0;

        $nivel_estudio = false;
        $ponderacionNivel = [];
        $conteoNivel = 0;
        foreach ($educaciones as $educacion) {
            foreach ($candidatoEducacion as $candiEdu) {
                if ($educacion->nivel_estudio == $candiEdu->nivel_estudio) {
                    $comparacionExitosaNivel = $comparacionExitosaNivel + 1;
                    array_push($ponderacionNivel, $educacion->puntos);
                }
            }
        };
        if ($comparacionExitosaNivel >= ($conteoEducacion / 2)) {
            $nivel_estudio = true;
            foreach ($ponderacionNivel as $ponderacion) {
                $conteoNivel = $conteoNivel + $ponderacion;
            }
        }


        $titulado = false;
        $comparacionExitosaTitulo = 0;
        $ponderacionTitulo = [];
        $conteoTitulo = 0;
        foreach ($educaciones as $educacion) {
            foreach ($candidatoEducacion as $candiEdu) {
                similar_text($educacion->titulado, $candiEdu->titulado, $similitud);
                $umbralSimilitud = 60;
                if ($similitud >= $umbralSimilitud) {
                    $comparacionExitosaTitulo = $comparacionExitosaTitulo + 1;
                    array_push($ponderacionTitulo, $educacion->puntos);
                }
            }
        };
        if ($comparacionExitosaTitulo >= ($conteoEducacion / 2)) {
            $titulado = true;
            foreach ($ponderacionTitulo as $ponderacion) {
                $conteoTitulo = $conteoTitulo + $ponderacion;
            }
        }

        $meses = false;
        $conteoMeses = 0;
        foreach ($candidatoExperiencia as $candiEx) {
            if ($candiEx->meses >= $vacante->meses_experiencia) {
                $meses = true;
                $conteoMeses = $conteoMeses + 5;
            }
        };

        $postulacion = false;
        $sumaTotalPonderacion = 0;
        if ($nivel_estudio || $titulado && $meses == true) {
            $sumaTotalPonderacion = $conteoNivel + $conteoTitulo + $conteoMeses;
            $postulacion = true;
        }

        return view('candidato.sintesis', [
            'vacante' => $vacante, 'educaciones' => $educaciones,
            'funciones' => $funciones, 'candidato' => $candidato,
            'nivel' => $nivel_estudio, 'titulado' => $titulado,
            'meses' => $meses, 'postulacion' => $postulacion,
            'candidatosPostulados' => $candidatosPostulados,
            'sumaTotalPonderacion' => $sumaTotalPonderacion
        ]);
    }

    public function postulacion($idCandidato, $idVacante, $puntos)
    {
        $candidato = Candidato::find($idCandidato);
        $vacante = Vacante::find($idVacante);

        $postulacion = new Postulacion();
        $postulacion->candidato_id = $candidato->id;
        $postulacion->vacante_id = $vacante->id;
        $postulacion->save();

        $ponderacion = new Ponderacion();
        $ponderacion->ponderacion = $puntos;
        $ponderacion->postulacion_id = $postulacion->id;
        $ponderacion->save();

        return redirect()->route('candidato.index');
    }

    public function desvinculacion($idCandidato, $idVacante, $idPostulacion)
    {
        $postulacion = Postulacion::find($idPostulacion);
        $postulacion->delete();

        $desvinculacion = new CandidatoDesvinculacion();
        $desvinculacion->candidato_id = $idCandidato;
        $desvinculacion->vacante_id = $idVacante;
        $desvinculacion->save();

        return redirect()->route('login');
    }


    public function buscar(Request $request)
    {
        $busqueda = $request->busqueda;
        $contador = 0;
        $postulados = 0;

        // Se busca la tabla con la cual tiene relacion el modelo principal
        // por medio del metodo estatico whereHas
        $vacante = Vacante::whereHas('cargo', function ($query) use ($busqueda) {

            // Se busca la coincidencia que tiene todos los cargos con la
            // busqueda que nosotros realizamos
            $query->where('cargo', 'like', '%' . $busqueda . '%')

                ->orWhere('codigo', 'like', '%' . $busqueda . '%');
        })->get();
        $encontrado = $vacante->isNotEmpty();

        if ($encontrado == 0 || $busqueda == null) {
            return redirect()->route('candidato.index');
        } else {
            foreach ($vacante as $resul) {
                $contador = $contador + 1;
                $postulados = $postulados + 1;
            }
            return view('candidato.resultado', [
                'vacantes' => $vacante,
                'contador' => $contador,
                'postulados' => $postulados
            ]);
        }
    }
}
