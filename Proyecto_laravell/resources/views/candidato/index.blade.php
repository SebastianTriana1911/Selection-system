<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index Candidato</title>
    <link rel="stylesheet" href="{{ asset('css/candidato/index.css') }}">
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

        <nav class="nav">

            <article class="primer-contenedor">
                <h1>{{ $candidato->user->nombre }} {{ $candidato->user->apellido }}</h1>
                <h1>TI: {{ $candidato->user->num_documento }}</h1>
            </article>

            <article class="contenedor-estado">
                <div class="estado">
                    <h1>Disponible</h1>
                </div>
            </article>

            <article class="segundo-contenedor">
                <form class="destroy" action="{{route('candidato.destroy', ['id' => $candidato->user_id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar cuenta">
                </form>
                <a class="boton-a" href="{{ route('restaurar.create') }}">Cambiar contraseña</a>
                <article class="contenedor-logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="boton">Cerrar sesion</button>
                    </form>
                </article>
            </article>

        </nav>

        <!--------------------------------------------------------------------------------------------------------------------------------------------->


        <section class="contenedor-content">
            <article class="division">

                <article class="grid-1">
                    <article class="flex-1">
                        <article class="contenedor-hoja">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-sheet-plastic" style="color: black;"></i>
                                <h1 class="titulo">Hoja de vida</h1>
                            </article>

                            <article class="contenedor-p">
                                <p> En esta sección podras visualizar todos tus datos personales.</p>
                            </article>

                            <article class="contenedor-boton">
                                <a href="{{ route('candidato.hojavida', ['id' => $candidato->id]) }}">Ver</a>
                            </article>
                        </article>

                        <article class="contenedor-update">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-pen" style="color: black;"></i>
                                <h1 class="titulo">Actualizar datos</h1>
                            </article>
                            <article class="contenedor-p">
                                <p>En esta sección podras actualizar los datos de tu hoja de vida.</p>
                            </article>

                            <article class="contenedor-boton">
                                <a href="{{route('candidato.edit', ['id' => $candidato->id])}}">Actualizar</a>
                            </article>
                        </article>
                    </article>

                    <article class="flex-2">
                        <article class="contenedor-educacion">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-school" style="color: black"></i>
                                <h1 class="titulo">Agregar educacion</h1>
                            </article>
                            <article class="contenedor-p">
                                <p>En esta sección podras agregar educaciones a tu hoja de vida.</p>
                            </article>

                            <article class="contenedor-boton">
                                <a href="">Crear</a>
                            </article>
                        </article>

                        <article class="contenedor-update-educacion">
                            <article class="contenedor-titulo">
                                <i class="fa-solid fa-gears" style="color: black;"></i>
                                <h1 class="titulo">Agregar experiencia</h1>
                            </article>
                            <article class="contenedor-p">
                                <p>En esta sección podras agregar la experiencia que ha tenido</p>
                            </article>

                            <article class="contenedor-boton">
                                <a href="">Actualizar</a>
                            </article>
                        </article>
                    </article>
                </article>


                <article class="grid-2">

                    <article class="contenedor-buscar">
                        <article class="contenedor-titulo">
                            <h1 class="titulo">Buscar vacantes</h1>
                            <h1 class="linea"></h1>
                            <form class="formulario" action="" method="POST">
                                <article class="conjunto">
                                    <input class="buscar" type="text" name="busqueda" placeholder="Buscar vacante">
                                    <i class="fa-solid fa-magnifying-glass" style="color: white"></i>
                                </article>

                                <article class="contenedor-boton">
                                    <a href="">Vacantes</a>
                                    <input class="boton" type="submit" value="Buscar">
                                </article>
                            </form>
                        </article>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo-principal">Mis postulaciones</h1>
                        <h1 class="linea"></h1>
                        @php
                            $contador = 0;
                        @endphp
                        <article class="contenedor-postulaciones">
                            @forelse($desvinculaciones as $desvinculacion)
                                <article class="postulaciones">
                                    @php
                                        $contador++;
                                    @endphp
                                    <article class="contenedor-titulo">
                                        <h1 class="titulo">Postulacion {{ $contador }}</h1>
                                    </article>

                                    <p class="info"> Si deseas ver los datos de esta postulacion da click al boton
                                        informacion</p>

                                    <article class="contenedor-boton">
                                        <a class="boton" href="">Desvincularme</a>
                                        <a class="boton" href="">Info</a>
                                    </article>

                                </article>
                            @empty
                                <article class="contenedor-empty">
                                    <h1 class="empty">No te haz postulado a ninguna vacante por el momento</h1>
                                </article>
                            @endforelse
                        </article>
                    </article>

                </article>

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
