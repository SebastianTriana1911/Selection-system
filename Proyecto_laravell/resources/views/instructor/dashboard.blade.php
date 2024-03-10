<!-- DASHBOARD INSTRUCTOR -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/instructor/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Dashboard Instructor</title>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
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
        <section class="content">
            <section class="primera-columna">
                <a class="contenedor-super" href="{{ route('dashboard.super') }}">
                    <h1>Administradores</h1>
                </a>

                <a class="contenedor-instructor" href="{{ route('dashboard.instructor') }}">
                    <h1>Instructores</h1>
                </a>

                <a class="contenedor-reclutador" href="{{ route('dashboard.reclutador') }}">
                    <h1>Reclutadores</h1>
                </a>

                <a class="contenedor-seleccionador" href="{{ route('dashboard.seleccionador') }}">
                    <h1>Seleccionadores</h1>
                </a>

                <a class="contenedor-candidatos" href="{{ route('dashboard.candidato') }}">
                    <h1>Candidatos</h1>
                </a>

                <article class="contenedor-boton">
                    <a class="volver" href="{{ route('super.index') }}">Volver</a>
                </article>
            </section>

            <section class="segunda-columna">
                <article class="contenedor-titulo">
                    <article class="titulo">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <strong>Lista de instructores</strong>
                    </article>
                </article>

                <article class="contenedor-informacion">
                    @forelse($instructores as $instructor)
                        <article class="contenedor-instructor">

                            <article class="contenedor-logo">
                                <i class="fa-solid fa-user"></i>
                            </article>

                            <article class="contenedor-nombre">
                                <h1 class="titulo">{{ $instructor->user->nombre }} {{ $instructor->user->apellido }}
                                </h1>
                            </article>

                            <article class="contenedor-opciones">
                                <form class="formulario"
                                    action="{{ route('user.destroy', ['id' => $instructor->user_id]) }}"
                                    method="POST">
                                    @csrf

                                    @method('delete')

                                    <button class="contenedor-bote">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                <article class="rol">
                                    <form class="formulario-2"
                                        action="{{ route('update.rol', ['id' => $instructor->user_id]) }}"
                                        method="POST">
                                        @csrf
                                        <select class="menu" name="menu">
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                                            @endforeach
                                        </select>

                                        <button class="cambiar">
                                            Cambiar
                                        </button>
                                    </form>
                                </article>
                            </article>
                        </article>
                    @empty
                        <h3 class="empty">No hay ningun instructor registrado</h3>
                    @endforelse
                </article>
            </section>
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
