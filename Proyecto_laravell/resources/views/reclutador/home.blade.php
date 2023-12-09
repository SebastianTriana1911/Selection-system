<!-- VISTA INDEX DEL RECLUTADOR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/reclutador/home.css')}}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Home Reclutador</title>
</head>
<body>
    <main class="page">

        <header class="header">

            <section class="contenedor-logo">
                <span>S</span><span class="s-amarilla">S</span>
            </section>

            <section class="titulo">
                <span>Selection</span><section class="system">System</section>
            </section>

        </header>

    <!---------------------------------------------------------------->

        <nav class="nav">

            <article class="primer-contenedor">
                <h1>Reclutador {{$reclutador -> nombre}} {{$reclutador -> apellido}}</h1>
                <h1>Empresa {{$empresa}}</h1>
            </article>

            <article class="segundo-contenedor">
                
                <form action="{{route('reclutador.desvincular')}}" method="POST">
                    @csrf
                    <button class="boton">Desvincularme</button>
                </form>
                <article class="contenedor-logout">
                    <form action="{{route('logout')}}" method="POST">
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
                        <p>En este campo podra visualizar todos los datos correspondientes a la empresa a la que te has postulado o en su defecto has creado.</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{route('empresa.show', $empresaId)}}">Inspeccionar</a>
                    </article>

                </article>

                <article class="cuadro-2">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-house" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Crear vacantes</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo te permitira hacerlo asociando dicha vacante a la empresa para que cualquier candidato la pueda buscar y se pueda postular.</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="">Ver</a>
                        <a href="{{route('reclutador.empresa')}}">Crear</a>
                    </article>

                </article>

                <article class="cuadro-3">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-plus" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Crear Cargos</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podras crear una ocupacion visualizando las que ya estan creadas para que no haya redundancia al crearla.</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{route('reclutador.empresa')}}">Ver</a>
                        <a href="{{route('reclutador.empresa')}}">Crear</a>
                    </article>

                </article>

                <article class="cuadro-4">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-gear" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Crear Ocupaciones</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podras crear una ocupacion visualizando las que ya estan creadas para que no haya redundancia al crearla.</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{route('reclutador.empresa')}}">Ver</a>
                        <a href="{{route('reclutador.empresa')}}">Crear</a>
                    </article>

                </article>

            </article>


        </section>


    <!--------------------------------------------------------------------------------------------------------------------------------------------->

        <footer class="footer">
            <section class="contenedor-footer">

                <article class="contenedor-imagen">
                    <img class="logo-png" src="{{ asset('imagenes/Logo-negro.png') }}" alt="Logo"/>
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