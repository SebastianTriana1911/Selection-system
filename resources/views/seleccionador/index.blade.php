<!-- VISTA PARA CREAR UNA OCUPACION Y VER EL LISTADO DE LAS OCUPACIONES -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/seleccionador/index.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Home Seleccionador</title>
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
                <h1>Seleccionador {{ $seleccionador->user->nombre }} {{ $seleccionador->user->apellido }}</h1>
                <h1>Empresa {{ $empresa->nombre }}</h1>
            </article>

            <article class="segundo-contenedor">


                <a class="boton-a" href="{{ route('restaurar.create') }}">Cambiar contraseña</a>

                <form action="{{ route('seleccionador.desvincular') }}" method="POST">
                    @csrf
                    <button class="boton">Desvincularme</button>
                </form>
                <article class="contenedor-logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="boton">Cerrar sesion</button>
                    </form>
                </article>
            </article>

        </nav>

        <!---------------------------------------------------------------->

        <section class="contenedor-content">

            <article class="recuadro-menu">

                <article class="cuadro-1">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-building" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Ver datos de la empresa</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podra visualizar todos los datos correspondientes a la empresa a la que te has
                            postulado. Ten en cuenta que no podras modificar ninguno de estos datos solo observarlos.</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{ route('seleccionador.showEmpresa') }}">Inspeccionar</a>
                    </article>

                </article>

                <article class="cuadro-2">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-globe" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Observar vacantes creadas</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podras visualizar todas las vacantes creadas en la empresa, por consiguiente
                            podras observar los candidatos postulados para llevarlos de la mano con su proceso de
                            seleccion.</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{ route('seleccionador.vacante') }}">Observar</a>
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
