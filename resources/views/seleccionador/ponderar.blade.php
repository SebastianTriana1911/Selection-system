<!-- DASHBOARD DEL CANDIDATO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/seleccionador/ponderar.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Ponderaciones</title>
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
            <article class="contenedor-nav">
                <article class="contenedor-titulo">
                    @php
                        $descripcion = '';
                        if ($postulacion->candidato->user->genero == 'Masculino') {
                            $descripcion = 'el señor';
                        } else {
                            $descripcion = 'la señora';
                        }
                    @endphp
                    <i class="fa-solid fa-user-tie"></i>
                    <h1>Ponderacion de entrevistas tecnicas para {{ $descripcion }}
                        {{ $postulacion->candidato->user->nombre }} {{ $postulacion->candidato->user->apellido }}</h1>
                </article>
                <h1 class="linea"></h1>
            </article>
        </nav>

        <!----------------------------------------------------------------->

        <section class="content">
            <article class="contenido-completo">

                <article class="contenedor-titulo">
                    <article class="titulo">
                        <i class="fa-solid fa-down-long"></i>
                        <h1>Puntajes sobre cada entrevista</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="menu-ponderaciones">

                    <article class="ponderacion-educacion">
                        <h1>Ponderacion sobre educacion</h1>
                        <div>{{ $postulacion->ponderacionEducacion->ponderacion }}</div>
                        <article class="opciones">
                            <a href=""><i class="fa-solid fa-eye"></i></a>
                            <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        </article>
                    </article>

                    <article class="ponderacion-entrevista">
                        <h1>Ponderacion sobre entrevista</h1>
                        <div>{{ $postulacion->ponderacionEntrevista->ponderacion }}</div>
                        <article class="opciones">
                            <a href=""><i class="fa-solid fa-eye"></i></a>
                            <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        </article>
                    </article>

                    <article class="ponderacion-entrevista-tecnica">
                        <h1>Ponderacion sobre entrevista tecnica</h1>
                        <div>{{ $postulacion->ponderacionEntrevistaTecnica->ponderacion }}</div>
                        <article class="opciones">
                            <a href=""><i class="fa-solid fa-eye"></i></a>
                            <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        </article>
                    </article>

                    <article class="ponderacion-entrevista-psicologica">
                        <h1>Ponderacion sobre entrevista psicologica</h1>
                        <div>{{ $postulacion->ponderacionEntrevistaPsicologica->ponderacion }}</div>
                        <article class="opciones">
                            <a href=""><i class="fa-solid fa-eye"></i></a>
                            <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                        </article>
                    </article>
                </article>

                <article class="ponderacion-total">
                    <h1>Ponderacion total del candidato: {{ $postulacion->ponderacionTotal->ponderacion }} puntos</h1>
                </article>

                <article class="contenedor-boton">
                    <article class="opciones">
                        <a
                            href="{{ route('seleccionador.candidatosPostulados', ['id' => $postulacion->vacante->id]) }}">Volver</a>

                        <a href="">Citar a entrevista</a>
                    </article>
                </article>

            </article>
        </section>


        <section class="content-2">

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
