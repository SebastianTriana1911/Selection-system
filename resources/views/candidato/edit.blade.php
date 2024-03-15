<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Candidato</title>
    <link rel="stylesheet" href="{{ asset('css/candidato/edit.css') }}">
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

        <article class="contenedor-content">
            <form class="contenedor-put" action="{{ route('candidato.update', ['id' => $candidato->id]) }}"
                method="POST">
                @csrf
                @method('put')

                <article class="contenedor-titulo">
                    <article class="content">
                        <i class="fa-solid fa-rotate-right" style="color: #ffffff;"></i>
                        <h1 class="titulo">Actualizacion de datos</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="info">

                    <article class="contenedor-tipo">
                        <h1>Tipo de documento</h1>
                        <select class="menu-identificacion" name="tipo_documento" value="{{ old('tipo_documento') }}">
                            <option value="cedula de ciudadania">Cedula de ciudadania</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="cedula de extranjeria">Cedula de extranjeria</option>
                            <option value="cedula de extranjeria">Cedula de extranjeria</option>
                            <option value="Otro documento de identidad">Otro doumento de identidad</option>
                            <option value="Otro documento de identidad">Otro doumento de identidad</option>
                            <option value="Permiso especial de permanencia">Permiso especial de permanencia</option>
                            <option value="Permiso especial de permanencia">Permiso especial de permanencia</option>
                            <option value="Permiso por proteccion temporal">Permiso por proteccion temporal</option>
                        </select>
                        @error('tipo_documento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-numero-documento">
                        <h1>Numero de documento</h1>
                        <input type="text" name="num_documento"
                            value="{{ old('num_documento', $candidato->user->num_documento) }}">
                        @error('num_documento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-nombre">
                        <h1>Nombre</h1>
                        <input type="text" name="nombre" value="{{ old('nombre', $candidato->user->nombre) }}">
                        @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-apellido">
                        <h1>Apellido</h1>
                        <input type="text" name="apellido" value="{{ old('apellido', $candidato->user->apellido) }}">
                        @error('apellido')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="genero">
                        <h1>Genero</h1>
                        <select class="menu-generos" name="genero"
                            value="{{ old('genero', $candidato->user->genero) }}">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        @error('genero')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-estado">
                        <h1>Estado civil</h1>
                        <select class="menu-estado-civil" name="estado_civil"
                            value="{{ old('estado_civil', $candidato->user->estado_civil) }}">
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Union de hecho">Union de hecho</option>
                            <option value="Seoarado">Seorado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                        @error('estado_civil')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-fecha">
                        <h1>Fecha de nacimiento</h1>
                        <input type="date" name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $candidato->fecha_nacimiento) }}">
                        @error('fecha_nacimiento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-direccion">
                        <h1>Direccion</h1>
                        <input type="text" name="direccion" value="{{ old('direccion', $candidato->direccion) }}">
                        @error('direccion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-telefono">
                        <h1>Telefono</h1>
                        <input type="text" name="telefono" value="{{ old('telefono', $candidato->telefono) }}">
                        @error('telefono')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-email">
                        <h1>Email</h1>
                        <input type="email" name="email" value="{{ old('email', $candidato->user->email) }}">
                        @error('email')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-sobre-mi">
                        <h1>Sobre mi</h1>
                        <textarea name="perfil_ocupacional" cols="30" rows="6">{{ old('perfil_ocupacional', $candidato->perfil_ocupacional) }}</textarea>
                        @error('perfil_ocupacional')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                </article>

                <article class="contenedor-botones">
                    <a class="volver" href="{{ route('candidato.index') }}">Volver</a>
                    <input class="actualizar" type="submit" value="Actualizar">
                </article>

            </form>
        </article>
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
