<!-- VISTA PARA VER TODA LA INFORMACION DE UN INSTRUCTOR EN ESPECIFICO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/super/sintesisInstructor.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Sintesis instructor</title>
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

        <nav class="nav">

            <h1 class="titulo">{{ $titulo }}</h1>
            <h1 class="barra"></h1>

        </nav>

        <!---------------------------------------------------------------->

        <section class="contenedor-content">

            <article class="cuadro">

                <article class="contenedor-nombre">
                    <h1 class="nombre">{{ $user->nombre }}</h1>
                </article>

                <article class="contenedor-imagen">
                    <!-- Logica ´para mostrar la imagen segun el sexo-->
                    <img class="imagen" src="{{ $imagen }}" />
                </article>

                <article class="contenedor-boton">
                    <a class="boton" href="{{ route('listar.instructores') }}">Volver</a>
                </article>

            </article>
        </section>

        <section class="contenedor-sidebar">

            <article class="contenedor-cuadro">

                <article class="contenedor-titulo">
                    <article class="contenedor">
                        <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                        <h1 class="titulo">Informacion del instructor</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-informacion">


                    <article class="flex-1">
                        <article class="correo">
                            <h1 class="clave">Nombre completo</h1>
                            <span class="valor">{{ $user->nombre }} {{ $user->apellido }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Numero documento</h1>
                            <span class="valor">{{ $user->num_documento }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Genero</h1>
                            <span class="valor">{{ $user->genero }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Fecha de nacimiento</h1>
                            <span class="valor">{{ $user->instructor->fecha_nacimiento }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Telefono</h1>
                            <span class="valor">{{ $user->instructor->telefono }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Direccion</h1>
                            <span class="valor">{{ $user->instructor->direccion }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Correo electronico</h1>
                            <span class="valor">{{ $user->email }}</span>
                        </article>
                    </article>

                    <article class="flex-2">
                        <article class="correo">
                            <h1 class="clave">Municipio</h1>
                            <span class="valor">{{ $user->municipio->nombre }}</span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Profesion</h1>
                            <span class="valor">
                                @forelse($profesionInstructor as $profesion)
                                    @if ($profesion->titulado == null)
                                        <li class="valor">No hay profesion registrada</li>
                                    @else
                                        <li class="valor">{{ $profesion->titulado }}</li>
                                    @endif

                                @empty
                                    <span class="valor">El instructor no cuenta con ninguna profesion</span>
                                @endforelse
                            </span>
                        </article>

                        <article class="correo">
                            <h1 class="clave">Institucion egresado</h1>
                            @forelse($profesionInstructor as $profesion)
                                @if ($profesion->institucion == null)
                                    <li class="valor">No hay ninguna institucion registrada</li>
                                @else
                                    <li class="valor">{{ $profesion->institucion }}</li>
                                @endif

                            @empty
                                <span class="valor">El instructor no cuenta con ninguna profesion</span>
                            @endforelse
                        </article>

                        <article class="correo  ">
                            <h1 class="clave">Perfil profesional</h1>
                            @if ($user->instructor->perfil_profesional == null)
                                <p class="valor">El instructor no contiene un perfil profesional</p>
                            @else
                                <p class="valor">{{ $user->instructor->perfil_profesional }}</p>
                            @endif
                        </article>

                        <article class="correo">
                            <h1 class="clave">Documentos</h1>
                            <span class="valor">
                                @php
                                    $contador = 1;
                                @endphp
                                @forelse($rutas as $ruta)
                                    <li>
                                        <a class="valor-a" href="{{ asset('storage/' . $ruta) }}"
                                            target="_blank">Documento
                                            {{ $contador++ }}</a>
                                    </li>
                                @empty
                                    <span class="valor">No se cuenta con documentos que validen algun titulo
                                        profesional</span>
                                @endforelse
                            </span>
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
