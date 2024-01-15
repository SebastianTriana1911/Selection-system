<!-- VISTA PARA ACTUALIZAR EL REGISTRO DE ALGUN UN INSTRUCTOR -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Candidato/Css/hoja-vida.css">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/instructor/edit.css') }}">
    <title>Update instructor</title>
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
        <nav class="nav">

            <article class="primer-contenedor">
                <h1>Administrador {{ $administrador->nombre }} {{ $administrador->apellido }}</h1>
            </article>

            <article class="segundo-contenedor">

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
            <article class="contenedor-principal">
                <article class="titulo-principal">
                    <h2>Actualizacion de datos para el instructor {{$instructor->user->nombre}} {{$instructor->user->apellido}}</h2>
                </article>
                <form class="contenedor-hoja-vida" action="{{ route('instructor.update', ['id' => $idInstructor]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <section class="contenedor-informacion">
                        <article class="primera-fila">
                            <!------ Campo num_documento de la tabla users --------->
                            <article class="contenedor-numero-identificacion">
                                <h4 class="titulo">N identificacion</h4>
                                <input class="num-identificacion" type="text" name="num_documento"
                                    value="{{ old('num_documento', $instructor->user->num_documento) }}" />
                                @error('num_documento')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!------------------------------------------------------>

                            <!------ Campo tipo_documento de la tabla users -------->
                            <article class="contenedor-tipo-identificacion">
                                <h4 class="titulo">Tipo identificacion</h4>
                                <select class="menu-identificacion" name="tipo_documento"
                                    value="{{ old('tipo_documento') }}">
                                    <option value="cedula de ciudadania">Cedula de ciudadania</option>
                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                    <option value="cedula de extranjeria">Cedula de extranjeria</option>
                                    <option value="cedula de extranjeria">Cedula de extranjeria</option>
                                    <option value="Otro documento de identidad">Otro doumento de identidad</option>
                                    <option value="Otro documento de identidad">Otro doumento de identidad</option>
                                    <option value="Permiso especial de permanencia">Permiso especial de permanencia
                                    </option>
                                    <option value="Permiso especial de permanencia">Permiso especial de permanencia
                                    </option>
                                    <option value="Permiso por proteccion temporal">Permiso por proteccion temporal
                                    </option>
                                </select>
                                @error('tipo_documento')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!------------------------------------------------------>

                            <!---- Campo pais que corresponde al campo que se ingrese en municipio ---->
                            <article class="contenedor-pais">
                                <h4 class="titulo-pais">Pais</h4>
                                <select class="munu-pais">
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </article>
                            <!------------------------------------------------------------------------->
                        </article>


                        <article class="segunda-fila">
                            <!---- Campo departamento que corresponde al campo que se ingrese en municipio ---->
                            <article class="contenedor-departamento">
                                <h4 class="titulo">Departamento</h4>
                                <select class="munu-departamentos">
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                    @endforeach
                                </select>
                            </article>
                            <!---------------------------------------------------------------------------------->

                            <!--------- Campo municipio_id de la tabla users -------->
                            <article class="contenedor-municipio">
                                <h4 class="titulo-muni">Municipio</h4>
                                <select class="munu-municipios" name="municipio_id" value="{{ old('municipio_id') }}">
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('municipio_id')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!--------------------------------------------------------->

                            <!--------- Campo nombre de la tabla users -------->
                            <article class="contenedor-nombre">
                                <h3 class="titulo">Nombre</h3>
                                <input class="input" type="text" name="nombre" value="{{ old('nombre', $instructor->user->nombre) }}" />
                                @error('nombre')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!-------------------------------------------------->
                        </article>

                        <article class="tercera-fila">
                            <!--------- Campo apellido de la tabla users -------->
                            <article class="contenedor-apellido-1">
                                <h3 class="titulo">Apellido</h3>
                                <input class="input" type="text" name="apellido" value="{{ old('apellido', $instructor->user->apellido) }}" />
                                @error('apellido')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!-------------------------------------------------->

                            <!--------- Campo genero de la tabla users -------->
                            <article class="contenedor-genero">
                                <h3 class="titulo">Genero</h3>
                                <select class="menu-generos" name="genero" value="{{ old('genero', $instructor->user->genero) }}">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                                @error('genero')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!-------------------------------------------------->

                            <!------- Campo estado_civil de la tabla users ------->
                            <article class="contenedor-estado">
                                <h3 class="titulo">Estado civil</h3>
                                <select class="menu-estado-civil" name="estado_civil"
                                    value="{{ old('estado_civil') }}">
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
                            <!---------------------------------------------------->


                        </article>

                        <article class="quinta-fila">
                            <!--------- Campo fecha_nacimiento de la tabla instructores -------->
                            <article class="contenedor-fecha">
                                <h3 class="titulo">Fecha nacimiento</h3>
                                <input class="input" type="date" name="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento', $instructor->fecha_nacimineto) }}" />
                                @error('fecha_nacimiento')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!-------------------------------------------------->

                            <!--------- Campo direccion de la tabla instructores -------->
                            <article class="contenedor-direccion">
                                <h3 class="titulo">Direccion</h3>
                                <input class="input" type="text" name="direccion"
                                    value="{{ old('direccion', $instructor->direccion) }}" />
                                @error('direccion')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!---------------------------------------------------->

                            <!--------- Campo direccion de la tabla users -------->
                            <article class="contenedor-telefono">
                                <h3 class="titulo">Telefono</h3>
                                <input class="input" type="tel" name="telefono"
                                    value="{{ old('telefono', $instructor->telefono) }}" />
                                @error('telefono')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!---------------------------------------------------->
                        </article>

                        <article class="cuarta-fila">
                            <!---------- Campo email de la tabla users ----------->
                            <article class="contenedor-email">
                                <h3 class="titulo">Correo electronico</h3>
                                <input class="input" type="email" name="email" value="{{ old('email', $instructor->user->email) }}" />
                                @error('email')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!---------------------------------------------------->
                        </article>


                        <article class="tercer">
                            <article class="contenedor-perfil">
                                <article class="perfil">
                                    <h1 class="titulo">Perfil profesional</h1> 
                                    <textarea class="input" name="perfil_profesional"cols="30" rows="4"
                                        placeholder="En este campo podras redactar tu como persona como te sientes en el ambito profesional y el ser un profesional">{{old('perfil_profesional', $perfil_profesional)}}</textarea>
                                </article>
                            </article>
                        </article>
                    </section>

                    <section class="contenedor-boton">
                        <a class="atras" href="{{ route('listar.instructores') }}">Atras</a>
                        <input class="input" type="submit" value="Actualizar" />
                    </section>
                </form>
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
