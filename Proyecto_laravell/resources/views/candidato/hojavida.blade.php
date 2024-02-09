<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Candidato</title>
    <link rel="stylesheet" href="{{ asset('css/candidato/hojavida.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
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

        <section class="contenedor-content">
            <article class="contenedor-padre">
                <article class="contenedor-hoja">

                    <article class="linea-1">
                        <article class="contenedor-imagen">
                            <img class="imagen" src="{{ $sexo }}" alt="Genero">
                        </article>

                        <article class="info-linea-1">
                            <article class="contenedor-nombre">
                                <h1 class="nombre">{{ $candidato->user->nombre }}</h1>
                                <h1 class="apellido">{{ $candidato->user->apellido }}</h1>
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
                            <h1>Estudios</h1>
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
                                                $ruta = $educacion->documento
                                            @endphp
                                            <a class="documento" href="{{ asset('storage/' . $ruta) }}" target="_blank">Documento</a>
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
                                                <p>Certificado</p>
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

            <article class="contenedor-boton">
                <a class="boton" href="{{ route('candidato.index') }}">Volver</a>
            </article>
        </section>

        <!--------------------------------------------------------------------------------------------------------------------------------------------->

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
