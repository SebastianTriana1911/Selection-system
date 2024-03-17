<!-- VISTA PARA VER TODAS LAS VACANTES QUE TIENE UNA EMPRESA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/vacante/show.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Show Vacantes</title>
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

        <nav class="nav">
            <section class="contenedor-nav">
                <article class="titulo-principal">
                    <h1 class="titulo">Datos de la vacante {{ $vacante->cargo->cargo }}</h1>
                    <h1 class="linea"></h1>
                </article>
            </section>
        </nav>

        <!---------------------------------------------------------------->

        <section class="contenedor-content">
            <article class="contenedor-grid">

                <article class="contenedor-datos">

                    <article class="datos-vacante">

                        <article class="encabezado">
                            <article class="contenedor-titulo">
                                <i class="fa-regular fa-newspaper" style="color: #ffffff;"></i>
                                <h1 class="titulo">Datos principales</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="grid">
                            <article class="grid-1">
                                <article class="contenedor-codigo">
                                    <h1 class="titulo">Codigo: </h1>
                                    <p> {{ $vacante->codigo }}</p>
                                </article>

                                <article class="contenedor-num-vacante">
                                    <h1 class="titulo">Numero de vacantes: </h1>
                                    <p>{{ $vacante->num_vacante }}</p>
                                </article>

                                <article class="contenedor-mes-experiencia">
                                    <h1 class="titulo">Meses experiencia: </h1>
                                    <p>{{ $vacante->meses_experiencia }}</p>
                                </article>

                                <article class="contenedor-salario">
                                    <h1 class="titulo">Salario: </h1>
                                    <p>${{ $vacante->salario }}</p>
                                </article>

                                <article class="contenedor-tipo-salario">
                                    <h1 class="titulo">Tipo de salario: </h1>
                                    <p>{{ $vacante->tipo_salario }}</p>
                                </article>
                            </article>

                            <article class="grid-2">
                                <article class="contenedor-tipo-contrato">
                                    <h1 class="titulo">Tipo contrato: </h1>
                                    <p>{{ $vacante->tipo_contrato }}</p>
                                </article>

                                <article class="contenedor-tipo-jornada">
                                    <h1 class="titulo">Tipo de jornada: </h1>
                                    <p>{{ $vacante->tipo_jornada }}</p>
                                </article>

                                @if ($vacante->estado == 1)
                                    <article class="contenedor-estado">
                                        <h1 class="titulo">Estado: </h1>
                                        <p>Activo</p>
                                    </article>
                                @else
                                    <article class="contenedor-estado">
                                        <h1 class="titulo">Estado: </h1>
                                        <p>Inactivo</p>
                                    </article>
                                @endif

                                <article class="contenedor-empresa">
                                    <h1 class="titulo">Empresa: </h1>
                                    <p>{{ $vacante->empresa->nombre }}</p>
                                </article>

                                <article class="contenedor-postulados">
                                    <h1 class="titulo">Postulados: </h1>
                                    <p>{{ $postulados }}</p>
                                </article>
                            </article>
                        </article>
                    </article>


                    <article class="ubicacion">
                        <article class="encabezado">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                                <h1 class="titulo">Ubicaciones</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="flex">
                            <article class="contenedor-pais">
                                <h1 class="titulo">Pais: </h1>
                                <p>{{ $vacante->municipio->departamento->pais->nombre }}</p>
                            </article>

                            <article class="contenedor-departamento">
                                <h1 class="titulo">Departamento: </h1>
                                <p>{{ $vacante->municipio->departamento->nombre }}</p>
                            </article>

                            <article class="contenedor-municipio">
                                <h1 class="titulo">Municipio: </h1>
                                <p>{{ $vacante->municipio->nombre }}</p>
                            </article>
                        </article>
                    </article>

                    <article class="datos-cargo">
                        <article class="encabezado">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-briefcase" style="color: #ffffff;"></i>
                                <h1 class="titulo">Datos sobre el cargo</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="linea">
                            <article class="contenedor-cargo">
                                <h1 class="titulo">Cargo: </h1>
                                <p>{{ $vacante->cargo->cargo }}</p>
                            </article>

                            <article class="contenedor-habilidad">
                                <h1 class="titulo">Habilidades del cargo:</h1>
                                <p>{{ $vacante->cargo->habilidad }}</p>
                            </article>

                            <article class="contenedor-competencia">
                                <h1 class="titulo">Competencias del cargo</h1>
                                <p>{{ $vacante->cargo->competencia }}</p>
                            </article>
                        </article>
                    </article>


                    <article class="datos-educacion">
                        <article class="encabezado">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-school" style="color: #ffffff;"></i>
                                <h1 class="titulo">Educacion requerida</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        @forelse($educaciones as $educacion)
                            <article class="informacion-educacion">

                                <article class="grid">
                                    <article class="nivel">
                                        <h1 class="titulo">Nivel de estudio: </h1>
                                        <p>{{ $educacion->nivel_estudio }}</p>
                                    </article>

                                    <article class="titulacion">
                                        <h1 class="titulo">Titulacion: </h1>
                                        <p>{{ $educacion->titulado }}</p>
                                    </article>
                                </article>

                                <article class="grid-2">
                                    @if ($educacion->descripcion == null)
                                        <article class="descripcion">
                                            <h1 class="titulo">Descripcion: </h1>
                                            <p>Esta educacion no contiene descripcion</p>
                                        </article>
                                    @else
                                        <article class="descripcion">
                                            <h1 class="titulo">Descripcion: </h1>
                                            <p>{{ $educacion->descripcion }}</p>
                                        </article>
                                    @endif
                                </article>
                                <hr>

                            </article>
                        @empty
                            <h1 class="empty">No hay educacion requerida para esta vacante</h1>
                        @endforelse
                    </article>


                    <article class="datos-ocupacion">
                        <article class="encabezado">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-gears" style="color: #ffffff;"></i>
                                <h1 class="titulo">Datos sobre la ocupacion</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="contenedor-ocupacion">
                            <h1 class="titulo">Ocupacion: </h1>
                            <p>{{ $vacante->cargo->ocupacion->nombre }}</p>
                        </article>

                        <article class="contenedor-descripcion">
                            <h1 class="titulo">Descripcion: </h1>
                            <p>{{ $vacante->cargo->ocupacion->descripcion }}</p>
                        </article>

                        <article class="contenedor-funciones">
                            <h1>Funciones: </h1>
                            @forelse($funciones as $funcion)
                                    <ul>
                                        <li>{{$funcion->funcion}}</li>
                                    </ul>
                                @empty

                            @endforelse
                        </article>
                    </article>
                </article>
            </article>


            <article class="contenedor-boton">
                <a class="boton" href="{{ route('vacante.index', ['id' => $empresa->id]) }}">Volver</a>
                <form action="{{ route('vacante.estado', ['id' => $vacante->id]) }}" method="POST">
                    @csrf

                    <button class="boton">Cambiar estado</button>
                </form>
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
