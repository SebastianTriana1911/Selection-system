<!-- VISTA PARA VER TODAS LAS VACANTES QUE TIENE UNA EMPRESA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/seleccionador/datosPostulacion.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Datos de la postulacion</title>
</head>

<body>
    <main class="page">

        <header class="header">

            <section class="contenedor-logo">
                <span>S</span><span class="s-amarilla">S</span>
            </section>

            <section class="titulo">
                <span>Selection</span>
                <section class="system">System</section>
            </section>

        </header>

        <!---------------------------------------------------------------->

        <section class="nav">
            <article class="contenedor-uno-nav">
                <h1>Sintesis de la vacante</h1>
                <h1 class="linea"></h1>
            </article>

            <article class="contenedor-dos-nav">
                <h1>Hoja de vida del candidato</h1>
                <h1 class="linea"></h1>
            </article>
        </section>

        <!---------------------------------------------------------------->

        <section class="content">
            <article class="division">
                <article class="grid">
                    <article class="informacion">
                        <article class="datos-principales">
                            <article class="contenedor-titulo">
                                <article class="titulo">
                                    <i class="fa-solid fa-paperclip" style="color: white"></i>
                                    <h1>Datos principales</h1>
                                </article>
                                <h1 class="linea"></h1>
                            </article>
                            <article class="info">

                                <article class="grid-1">
                                    <article class="codigo">
                                        <h1>Codigo: </h1>
                                        <p>{{ $postulacion->vacante->codigo }}</p>
                                    </article>

                                    <article class="num_vacante">
                                        <h1>Vacantes disponibles: </h1>
                                        <p>{{ $postulacion->vacante->num_vacante }}</p>
                                    </article>

                                    <article class="meses">
                                        <h1>Meses de experiencia: </h1>
                                        <p>{{ $postulacion->vacante->meses_experiencia }}</p>
                                    </article>

                                    <article class="salario">
                                        <h1>Salario: </h1>
                                        <p>${{ $postulacion->vacante->salario }}</p>
                                    </article>

                                    <article class="salario">
                                        <h1>Postulados: </h1>
                                        {{-- <p>{{ $candidatosPostulados }}</p> --}}
                                    </article>
                                </article>

                                <article class="grid-2">
                                    <article class="tipo">
                                        <h1>Tipo de salario: </h1>
                                        <p>{{ $postulacion->vacante->tipo_salario }}</p>
                                    </article>

                                    <article class="contrato">
                                        <h1>Tipo de contrato: </h1>
                                        <p>{{ $postulacion->vacante->tipo_contrato }}</p>
                                    </article>

                                    <article class="jornada">
                                        <h1>Tipo de jornada</h1>
                                        <p>{{ $postulacion->vacante->tipo_jornada }}</p>
                                    </article>

                                    <article class="empresa">
                                        <h1>Empresa: </h1>
                                        <p>{{ $postulacion->vacante->empresa->nombre }}</p>
                                    </article>
                                </article>
                            </article>
                        </article>

                        <article class="lugar-ejecucion">
                            <article class="contenedor-titulo">
                                <article class="titulo">
                                    <i class="fa-solid fa-location-dot" style="color: white"></i>
                                    <h1>Lugar de ejecucion</h1>
                                </article>
                                <h1 class="linea"></h1>
                            </article>

                            <article class="info">
                                <article class="pais">
                                    <h1>Pais</h1>
                                    <p>{{ $postulacion->vacante->municipio->departamento->pais->nombre }}</p>
                                </article>
                                <article class="departamento">
                                    <h1>Departamento</h1>
                                    <p>{{ $postulacion->vacante->municipio->departamento->nombre }}</p>
                                </article>
                                <article class="municipio">
                                    <h1>Municipio</h1>
                                    <p>{{ $postulacion->vacante->municipio->nombre }}</p>
                                </article>
                            </article>
                        </article>

                        <article class="datos-cargo">
                            <article class="contenedor-titulo">
                                <article class="titulo">
                                    <i class="fa-brands fa-slack" style="color:white"></i>
                                    <h1>Datos sobre el cargo</h1>
                                </article>
                                <h1 class="linea"></h1>
                            </article>

                            <article class="info">
                                <article class="cargo">
                                    <h1>Cargo: </h1>
                                    <p>{{ $postulacion->vacante->cargo->cargo }}</p>
                                </article>

                                <article class="textos">
                                    <article class="habilidad">
                                        <h1>Habilidades:</h1>
                                        <p>{{ $postulacion->vacante->cargo->habilidad }}</p>
                                    </article>

                                    <article class="competencia">
                                        <h1>Competencias:</h1>
                                        <p>{{ $postulacion->vacante->cargo->competencia }}</p>
                                    </article>
                                </article>

                                <article class="funciones">
                                    <h1>Funciones del cargo:</h1>
                                    @forelse ($funciones as $funcion)
                                        <ul>
                                            <li>{{ $funcion->funcion }}</li>
                                        </ul>
                                    @empty
                                        <p>No hay funciones</p>
                                    @endforelse
                                </article>
                            </article>
                        </article>

                        <article class="educacion">
                            <article class="contenedor-titulo">
                                <article class="titulo">
                                    <i class="fa-solid fa-user-graduate" style="color:white"></i>
                                    <h1>Educacion requerida</h1>
                                </article>
                                <h1 class="linea"></h1>
                            </article>

                            <article class="info">
                                <article class="primera-linea">
                                    <article class="nivel">
                                        <h1>Nivel de estudio</h1>
                                        @forelse($educaciones as $educacion)
                                            <p>{{ $educacion->nivel_estudio }}</p>
                                        @empty
                                            <h1>El cargo no requiere de ningun estudio</h1>
                                        @endforelse
                                    </article>
                                    <article class="titulacion">
                                        <h1>Titulo requerido</h1>
                                        @forelse($educaciones as $educacion)
                                            <p>{{ $educacion->titulado }}</p>
                                        @empty
                                            <h1>El cargo no requiere de ninguna titulacion</h1>
                                        @endforelse
                                    </article>
                                </article>
                                <article class="descripcion">
                                    <h1>Descripcion</h1>
                                    @forelse($educaciones as $educacion)
                                        @if ($educacion->descripcion == null)
                                            <p>No hay una descripcion para esta vacante</p>
                                        @else
                                            <p>{{ $educacion->descripcion }}</p>
                                        @endif
                                    @empty
                                        <h1>El cargo no requiere de ningun estudio</h1>
                                    @endforelse
                                </article>
                            </article>
                        </article>
                    </article>
                </article>
            </article>
        </section>

        <!---------------------------------------------------------------->

        <section class="contenedor-content">
            <article class="contenedor-padre">
                <article class="contenedor-hoja">

                    <article class="linea-1">
                        <article class="contenedor-imagen">
                            @if (substr($imagen, 0, 1) === '/')
                                <img class="imagen" src="{{ $imagen }}" alt="Genero">
                            @else
                                <img class="imagen" src="{{ asset($imagen) }}" alt="Genero">
                            @endif
                        </article>

                        <article class="info-linea-1">
                            <article class="contenedor-nombre">
                                <h1 class="nombre">{{ $candidato->user->nombre }} {{ $candidato->user->apellido }}
                                </h1>
                            </article>

                            <article class="info-linea-2">
                                <article class="grid-1">
                                    <article class="num_documento">
                                        <i class="fa-solid fa-hashtag" style="color: black;"></i>
                                        <p>{{ $candidato->user->num_documento }}</p>
                                    </article>

                                    <article class="genero">
                                        <i class="fa-solid fa-venus-mars" style="color:black"></i>
                                        <p>{{ $candidato->user->genero }}</p>
                                    </article>

                                    <article class="telefono">
                                        <i class="fa-solid fa-phone" style="color: black"></i>
                                        <p>{{ $candidato->telefono }}</p>
                                    </article>
                                </article>

                                <article class="grid-2">

                                    <article class="tipo-doc">
                                        <i class="fa-solid fa-address-card" style="color:black"></i>
                                        <p>{{ $candidato->user->tipo_documento }}</p>
                                    </article>

                                    <article class="ubicacion">
                                        <i class="fa-solid fa-street-view" style="color: black"></i>
                                        <p>{{ $candidato->direccion }}</p>
                                    </article>

                                    <article class="correo">
                                        <i class="fa-solid fa-envelope" style="color: black;"></i>
                                        <p>{{ $candidato->user->email }}</p>
                                    </article>

                                </article>
                            </article>
                        </article>
                    </article>

                    <article class="linea-2">
                        <article class="contenedor-titulo">
                            <h1>Sobre mi</h1>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="sobre-mi">
                            <p>{{ $candidato->perfil_ocupacional }}</p>
                        </article>
                    </article>

                    <article class="linea-3">
                        <article class="contenedor-titulo">
                            <h1>Educacion / Estudios</h1>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="contenedor-estudios">
                            @php
                                $cont = 1;
                            @endphp
                            @forelse ($candidatoEducacion as $educacion)
                                <article class="seccion-estudios">

                                    <article class="grupo-1">
                                        <article class="nivel">
                                            <h1 class="titulo">Nivel de estudio</h1>
                                            <p>Bachillerato</p>
                                        </article>

                                        <article class="titulado">
                                            <h1 class="titulo">Titulo</h1>
                                            <p class="p">Ingeniero en sistemas</p>
                                        </article>
                                    </article>

                                    <article class="grupo-2">
                                        <article class="institucion">
                                            <h1 class="titulo">Institucion</h1>
                                            <p>{{ $educacion->institucion }}</p>
                                        </article>

                                        <article class="titulado">
                                            <h1 class="titulo">Documento</h1>
                                            @php
                                                $ruta = $educacion->documento;
                                            @endphp
                                            <a class="documento" href="{{ asset('storage/' . $ruta) }}"
                                                target="_blank">Documento</a>
                                        </article>
                                    </article>

                                    <article class="grupo-3">
                                        <article class="año-inicio">
                                            <h1 class="titulo">Fecha de ingreso</h1>
                                            <p>{{ $educacion->año_inicio }}</p>
                                        </article>

                                        <article class="año-fin">
                                            <h1 class="titulo">Fecha de finalizacion</h1>
                                            <p>{{ $educacion->año_finalizacion }}</p>
                                        </article>
                                    </article>
                                </article>

                                @php
                                    $cont++;
                                @endphp
                                @if ($cont >= 1)
                                    <h1 class="linea-separador"></h1>
                                @endif

                            @empty
                                <p class="empty-estudio">Usted no cuenta con estudios registrado en el
                                    sistema</p>
                            @endforelse
                        </article>
                    </article>


                    <article class="linea-4">
                        <article class="contenedor-titulo">
                            <h1>Experiencia laboral</h1>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="contenedor-experiencia">
                            @forelse($candidatoExperiencia as $experiencia)
                                <article class="experiencia">

                                    <article class="flex">
                                        <article class="grupo-1">
                                            <article class="año_inicio">
                                                <p>{{ $experiencia->año_inicio }}</p>
                                            </article>
                                            <p>/</p>
                                            <article class="año_finalizacion">
                                                <p>{{ $experiencia->año_finalizacion }}</p>
                                            </article>

                                            <article class="empresa">
                                                <p>{{ $experiencia->nombre_empresa }}</p>
                                            </article>
                                        </article>

                                        <article class="grupo-2">
                                            <article class="certificado">
                                                @php
                                                    $ruta = $experiencia->certificacion_laboral;
                                                @endphp
                                                <a class="documento_experiencia"
                                                    href="{{ asset('storage/' . $ruta) }}"
                                                    target="_blank">Certificado</a>
                                            </article>
                                        </article>
                                    </article>

                                    <article class="descripcion">
                                        <h1>Descripcion</h1>
                                        <p>{{ $experiencia->descripcion }}</p>
                                    </article>
                                </article>

                            @empty
                                <p class="empty-experiencia">Usted no cuenta con experiencia profecional registrada en
                                    el
                                    sistema</p>
                            @endforelse
                        </article>
                    </article>
                </article>
            </article>

            <article class="contenedor-recomendacion">
                <article class="titulo">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h1>Informacion importante</h1>
                </article>

                <article class="informacion">
                    <p>Este espacio te brinda la oportunidad de validar y comparar la hoja de vida del candidato que se
                        ha postulado con los requisitos específicos de la vacante. Tendrás la opción de designar a este
                        candidato como preseleccionado para cubrir la vacante, lo que le permitirá participar en
                        diversas entrevistas y pruebas adicionales. Esto le brinda al candidato la oportunidad de
                        avanzar en el proceso de selección, acercándose cada vez más a la finalización y a la
                        posibilidad de asegurar el puesto.

                        Si consideras que este candidato es apto para continuar en el proceso de selección, puedes hacer
                        clic en el botón correspondiente para designarlo como preseleccionado.</p>
                </article>

                @if ($postulacion->candidato->estado == 'Preseleccionado')
                    <article class="contenedor-boton">
                        <a href="{{route('seleccionador.candidatosPostulados', ['id' => $postulacion->vacante->id])}}">Volver</a>

                        <div class="cambio-estado">
                            Preseleccionado
                        </div>
                    </article>
                @else
                    <form
                        action="{{ route('seleccionador.estadoPreseleccionado', ['idCandidato' => $candidato->id, 'idVacante' => $postulacion->vacante->id]) }}"
                        method="POST">
                        @csrf
                        <button class="boton">
                            Preseleccionado
                        </button>
                    </form>
                @endif
            </article>
        </section>

        <!---------------------------------------------------------------->

        <footer class="footer">
            <section class="contenedor-footer">

                <article class="contenedor-imagen">
                    <img class="logo-png" src="{{ asset('imagenes/Logo-negro.png') }}" alt="Logo" />
                </article>

                <section class="informacion">

                    <article class="sebas">
                        <h3 class="titulo-sebas">Sebastian Triana</h3>
                        <span>3214860900</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="william">
                        <h3>William Lozano</h3>
                        <span>3153504473</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="peter">
                        <h3>Peter Bustamante</h3>
                        <span>3044479143</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="capera">
                        <h3>Diego Capera</h3>
                        <span>3005301839</span>

                        <section class="apps">
                            <a href= "https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href= "https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href= "https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href= "https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                </section>
            </section>
        </footer>
    </main>
</body>

</html>
