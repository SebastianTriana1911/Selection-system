<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Desvinculacion</title>
    <link rel="stylesheet" href="{{ asset('css/desvinculacion/show.css') }}">
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

        <!--------------------------------------------------------------------------------------------------------------------------------------------->

        <section class="contenedor-content">
            <article class="informacion">
                <article class="contenedor-titulo">
                    <h1>Consulta de postulacion</h1>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-informacion">
                    <article class="informacion-vacante">
                        <article class="titulo-principal">
                            <article class="flex">
                                <i class="fa-solid fa-eye" style="color: #ffffff;"></i>
                                <h1>Detalle del proceso de seleccion</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="info">
                            <article class="titulo">
                                <h1>{{ $desvinculacion->vacante->empresa->nombre }}</h1>
                            </article>

                            <article class="contenedor-primer">
                                <article class="primera-linea">
                                    <article class="cargo">
                                        <h1>Especialidad </h1>
                                        <p>{{ $desvinculacion->vacante->cargo->cargo }}</p>
                                    </article>

                                    <article class="ocupacion">
                                        <h1>Ocupacion </h1>
                                        <p>{{ $desvinculacion->vacante->cargo->ocupacion->nombre }}</p>
                                    </article>

                                    <article class="departamento">
                                        <h1>Departamento </h1>
                                        <p>{{ $desvinculacion->vacante->municipio->departamento->nombre }}</p>
                                    </article>
                                </article>
                            </article>

                            <hr>

                            <article class="contenedor-segundo">
                                <article class="segunda-linea">
                                    <article class="habilidades">
                                        <h1>Habilidades que debe de contar el aspirante </h1>
                                        <p>{{ $desvinculacion->vacante->cargo->habilidad }}</p>
                                    </article>

                                    <article class="competencia">
                                        <h1>Competencias que debe de contar el aspirante</h1>
                                        <p>{{ $desvinculacion->vacante->cargo->competencia }}</p>
                                    </article>

                                    <article class="funciones">
                                        <h1>Funciones segun la ocupacion</h1>
                                        @forelse ($funciones as $funcion)
                                            <ul>
                                                <li>{{ $funcion->funcion }}</li>
                                            </ul>
                                        @empty
                                            <p class="empty-if">A este cargo no se le han asignado funciones</p>
                                        @endforelse
                                    </article>
                                </article>
                            </article>

                            <hr>

                            <article class="contenedor-tercero">
                                <article class="tercera-linea">
                                    <article class="estado">
                                        <h1>Estado </h1>
                                        @php
                                            $estado = '';
                                            if ($desvinculacion->vacante->estado == 0) {
                                                $estado = 'Terminado';
                                            } else {
                                                $estado = 'Activo';
                                            }
                                        @endphp
                                        <p>{{ $estado }}</p>
                                    </article>
                                </article>
                            </article>

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