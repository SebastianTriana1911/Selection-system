<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Candidato/Css/hoja-vida.css">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/instructor/create.css') }}">
    <title>Insert instructor</title>
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

        <section class="contenedor-content">
            <form class="contenedor-hoja-vida" action="{{ route('instructor.store') }}" method="POST">
                @csrf

                <section class="contenedor-informacion">
                    <article class="titulo-principal">
                        <h2>Registro de instructor</h2>
                    </article>

                    <article class="primera-fila">
                    <!------ Campo num_documento de la tabla users --------->
                    <article class="contenedor-numero-identificacion">
                        <h4 class="titulo">Numero de identificacion</h4>
                        <input class="num-identificacion" type="text" name="num_documento"
                            value="{{ old('num_documento') }}" />
                    </article>

                    @error('num_documento')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!------------------------------------------------------>

                    <!------ Campo tipo_documento de la tabla users -------->
                    <article class="contenedor-tipo-identificacion">
                        <h4 class="titulo">Tipo de identificacion</h4>
                        <select class="menu-identificacion" name="tipo_documento"
                            value="{{ old('tipo_documento') }}">
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
                    </article>

                    @error('tipo_documento')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
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
                    <article class="contenedor-departamento">
                        <h4 class="titulo-muni">Municipio</h4>
                        <select class="munu-municipios" name="municipio_id" value="{{ old('municipio_id') }}">
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                            @endforeach
                        </select>
                    </article>
                    @error('municipio_id')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!--------------------------------------------------------->

                    <!--------- Campo nombre de la tabla users -------->
                    <article class="contenedor-nombre">
                        <h3 class="titulo">Nombre</h3>
                        <input class="input" type="text" name="nombre" value="{{ old('nombre') }}" />
                    </article>
                    @error('nombre')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!-------------------------------------------------->
                    </article>

                    <article class="tercera-fila">
                    <!--------- Campo apellido de la tabla users -------->
                    <article class="contenedor-apellido-1">
                        <h3 class="titulo">Apellido</h3>
                        <input class="input" type="text" name="apellido" value="{{ old('apellido') }}" />
                    </article>
                    @error('apellido')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!-------------------------------------------------->

                    <!--------- Campo genero de la tabla users -------->
                    <article class="contenedor-genero">
                        <h3 class="titulo">Genero</h3>
                        <select class="menu-generos" name="genero" value="{{ old('genero') }}">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </article>
                    @error('genero')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!-------------------------------------------------->

                    <!--------- Campo direccion de la tabla users -------->
                    <article class="contenedor-direccion">
                        <h3 class="titulo">Direccion</h3>
                        <input class="input" type="text" name="direccion" value="{{ old('direccion') }}" />
                    </article>
                    @error('direccion')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!---------------------------------------------------->
                    </article>

                    <article class="cuarta-fila">
                    <!------- Campo estado_civil de la tabla users ------->
                    <article class="contenedor-estado">
                        <h3 class="titulo">Estado civil</h3>
                        <select class="menu-estado-civil" name="estado_civil" value="{{ old('estado_civil') }}">
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Union de hecho">Union de hecho</option>
                            <option value="Seoarado">Seorado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                    </article>
                    @error('estado_civil')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!---------------------------------------------------->

                    <!---------- Campo email de la tabla users ----------->
                    <article class="contenedor-email">
                        <h3 class="titulo">Correo electronico</h3>
                        <input class="input" type="email" name="email" value="{{ old('email') }}" />
                    </article>
                    @error('email')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!---------------------------------------------------->

                    <!------- Campo contraseña de la tabla users --------->
                    <article class="contenedor-contraseña">
                        <h3 class="titulo">Contraseña</h3>
                        <input class="input" type="password" name="password"
                            value="{{ old('password') }}" />
                    </article>
                    @error('password')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror
                    <!---------------------------------------------------->
                    </article>

                    <!-- Este input no se muestra en la vista pero corresponde a que el campo
                        role_id en esta vista sera por defecto dos que corresponde al rol candidato -->
                        <input type="number" name="role_id" value="3" hidden>
                </section>

                <section class="contenedor-boton">
                    <a class="atras" href="{{ route('super.index') }}">Atras</a>
                    <input class="input" type="submit" value="Crear instructor" />
                </section>

            </form>
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
