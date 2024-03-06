<!-- VISTA INDEX DEL ADMINISTRADOR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/super/home.css')}}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Home Administrador</title>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
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
                <h1>Administrador {{$super -> nombre}} {{$super -> apellido}}</h1>
            </article>

            <article class="segundo-contenedor">

                <article class="contenedor-restablecer">
                    <a class="boton-restablecer" href="{{route('restaurar.create')}}">Cambiar contraseña</a>
                </article>

                <article class="contenedor-create">
                    <a class="boton-create" href="{{route('super.create')}}">Crear Admin</a>
                </article>
                
                <article class="contenedor-logout">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="boton-logout">Cerrar sesion</button>
                    </form>
                </article>
            </article>

        </nav>

    <!---------------------------------------------------------------->

        <section class="contenedor-content"> 

            <article class="recuadro-menu">

                <article class="cuadro-1">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-user" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Registrar Instructor</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podra registrar a un instructor para que tome el control de los roles entre todos los candidatos de Selection System</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{route('instructor.create')}}">Registrar</a>
                    </article>

                </article>

                <article class="cuadro-2">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-user" style="color: #000000;"></i>
                        <i class="fa-solid fa-user" style="color: #000000;"></i>
                        <i class="fa-solid fa-user" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Listar Instructores</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podra eliminar y consultar todos los instructores que haya en su momento registrados en Selection System</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{route('listar.instructores')}}">Consultar</a>
                    </article>

                </article>

                <article class="cuadro-3">

                    <article class="contenedor-logo">
                        <i class="fa-solid fa-user" style="color: #000000;"></i>
                    </article>

                    <article class="contenedor-x">
                        <i class="fa-solid fa-xmark fa-2xl" style="color: #ff0000;"></i>
                    </article>

                    <article class="contenedor-titulo">
                        <h1 class="titulo">Gestionar roles</h1>
                    </article>

                    <article class="contenedor-descripcion">
                        <p>En este campo podra consultar todas las personas que se encuentran en el sistema correspondientes a si rol dentro de Selection System</p>
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{route('dashboard.super')}}">Consultar</a>
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