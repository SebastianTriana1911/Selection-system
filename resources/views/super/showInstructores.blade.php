<!-- VISTA PARA VER TODOS LOS INSTRUCTORES DE LA BD -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/super/showInstructores.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Listar instructores</title>
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

        <!------------------------------------------------------------------------------------------------------------------------------------>

        <section class="contenedor-content">

            <article class="contenedor-nav">

                <article class="contenedor-rol">
                    <h1>Administrador {{ $user->nombre }} {{ $user->apellido }}</h1>
                </article>

                <article class="contenedor-titulo">
                    <article class="titulo">
                        <i class="fa-solid fa-down-long"></i>
                        <h1 class="titulo">Listados de instructores</h1>
                    </article>
                    <h1 class="barra"></h1>
                </article>

            </article>

            <article class="contenedor-informacion">

                <article class="scroll">
                    @forelse($instructores as $instructor)
                        <article class="contenedor-instructor">

                            <article class="contenedor-logo">
                                <i class="fa-solid fa-user" style="color: #000000;"></i>
                            </article>

                            <article class="contenedor-nombre">
                                <h1 class="titulo">{{ $instructor->user->nombre }} {{ $instructor->user->apellido }}
                                </h1>
                            </article>

                            <article class="opciones">

                                <article class="contenedor-1">
                                    <a href="{{ route('sintesis.instructor', ['id' => $instructor->user_id]) }}"><i
                                            id="ojito" class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('instructor.edit', ['id' => $instructor->id]) }}"><i
                                            id="lapiz" class="fa-solid fa-pencil"></i></a>
                                </article>

                                <article class="contenedor-2">
                                    <a
                                        href="{{ route('profesion.create', ['idInstructor' => $instructor->id, 'idUsuario' => $instructor->user_id]) }}"><i
                                            id="mas" class="fa-solid fa-plus"></i></a>
                                    <form action="{{ route('user.destroy', ['id' => $instructor->user_id]) }}"
                                        method="POST">
                                        @csrf

                                        @method('delete')

                                        <button class="contenedor-bote">
                                            <i id="caneca" class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </article>
                            </article>
                        </article>

                    @empty
                        <h3 class="empty">No hay ningun instructor registrado</h3>
                    @endforelse
                </article>
            </article>

            <article class="contenedor-boton">
                <a class="volver" href="{{ route('super.index') }}">Volver</a>
            </article>
        </section>

        <!------------------------------------------------------------------------------------------------------------------------------------>


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
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="william">
                        <h3>William Lozano</h3>
                        <span>3153504473</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="peter">
                        <h3>Peter Bustamante</h3>
                        <span>3044479143</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="capera">
                        <h3>Diego Capera</h3>
                        <span>3005301839</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
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
