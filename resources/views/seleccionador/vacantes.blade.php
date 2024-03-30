<!-- DASHBOARD DEL CANDIDATO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/seleccionador/vacante.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Vacantes de la empresa</title>
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
            <article class="nav">
                <article class="conjunto">
                    <article class="cantidad">
                        <h1>Cantidad de vacantes: {{ $cantidad }}</h1>
                    </article>
                    <article class="contenedor-titulo">
                        <article class="contenedor">
                            <i class="fa-solid fa-down-long"></i>
                            <h1>Lista de vacantes creadas por la empresa</h1>
                        </article>
                        <h1 class="linea"></h1>
                    </article>
                    <article>
                        <h1></h1>
                    </article>
                </article>
            </article>

            <article class="content">
                <article class="contenedor-vacante">
                    <article class="vacantes">
                        @forelse($vacantes as $vacante)
                            @if ($vacante->estado == 1)
                                <article class="informacion-vacante">


                                    <article class="grid-1">
                                        <article class="contenedor-codigo">
                                            <h1 class="titulo">{{ $vacante->codigo }}</h1>
                                        </article>
                                    </article>

                                    <article class="grid-2">

                                        <article class="contenedor-cargo">
                                            <h1 class="titulo">{{ $vacante->cargo->cargo }}</h1>
                                        </article>

                                        <article class="info">
                                            <article class="contenedor-salario">
                                                <h1 class="titulo">$ {{ $vacante->salario }}</h1>
                                            </article>

                                            <article class="contenedor-experiencia">
                                                <h1 class="titulo">Experiencia {{ $vacante->meses_experiencia }} meses
                                                </h1>
                                            </article>

                                            <article class="contenedor-contrato">
                                                <h1 class="titulo">{{ $vacante->tipo_contrato }}</h1>
                                            </article>

                                            <article class="contenedor-lugar">
                                                <h1>{{ $vacante->municipio->nombre }}</h1>
                                                <h1>{{ $vacante->municipio->departamento->pais->nombre }}</h1>
                                            </article>

                                            <article class="contenedor-num-vac">
                                                <h1 class="titulo"> Num vacantes {{ $vacante->num_vacante }}</h1>
                                            </article>

                                            <article class="contenedor-postulados">
                                                @php
                                                    $cantidadPostulados = 0;
                                                    $postulados = $vacante->postulacion;
                                                    $cantidadPostulados = 0;

                                                    foreach ($postulados as $postulado) {
                                                        $cantidadPostulados = $cantidadPostulados + 1;
                                                    }
                                                @endphp
                                                <h1 class="titulo">Postulados: {{ $cantidadPostulados }}</h1>
                                            </article>

                                        </article>
                                    </article>

                                    <article class="contenedor-boton-vacante">
                                        <a class="boton"
                                            href="{{ route('seleccionador.candidatosPostulados', ['id' => $vacante->id]) }}">
                                            <i class="fa-solid fa-users"></i>
                                        </a>
                                    </article>
                                </article>
                            @else
                                @continue
                            @endif
                        @empty
                            <article class="contenedor-empty">
                                <h1 class="empty">No hay vacantes registradas</h1>
                            </article>
                        @endforelse
                    </article>
                </article>

                <article class="contenedor-boton">
                    <a href="{{ route('seleccionador.index') }}">Volver</a>
                </article>
            </article>
        </section>

        <!----------------------------------------------------------------->

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
