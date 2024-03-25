<!-- VISTA PARA CREAR UN INSTRUCTOR -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Candidato/Css/hoja-vida.css">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/instructor/create.css') }}">
    <title>Registrar instructor</title>
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

        <!--------------------------------------------------------------------------------------------------------------------------------------------->

        <section class="contenedor-content">
            <article class="contenedor-principal">
                <form class="contenedor-hoja-vida" action="{{ route('instructor.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <article class="titulo-principal">
                        <article class="titulo">
                            <i class="fa-solid fa-chalkboard-user" style="color: #ffffff;"></i>
                            <h2>Formulario para el registro de un instructor</h2>
                        </article>
                        <h1 class="linea"></h1>
                    </article>

                    <section class="contenedor-informacion">

                        <article class="info-1">
                            <article class="contenedor-nombre">
                                <h3 class="titulo">Nombre</h3>
                                <input class="input" type="text" name="nombre" value="{{ old('nombre') }}" />
                                @error('nombre')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-apellido-1">
                                <h3 class="titulo">Apellido</h3>
                                <input class="input" type="text" name="apellido" value="{{ old('apellido') }}" />
                                @error('apellido')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-numero-identificacion">
                                <h4 class="titulo">Numero de identificacion</h4>
                                <input class="num-identificacion" type="text" name="num_documento"
                                    value="{{ old('num_documento') }}" />
                                @error('num_documento')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-tipo-identificacion">
                                <h4 class="titulo">Tipo de identificacion</h4>
                                <select class="menu-identificacion" name="tipo_documento"
                                    value="{{ old('tipo_documento') }}">
                                    <option value="cedula de ciudadania"
                                        {{ 'cedula de ciudadania' == old('tipo_documento') ? 'selected' : '' }}>Cedula
                                        de
                                        ciudadania</option>
                                    <option value="Tarjeta de identidad"
                                        {{ 'Tarjeta de identidad' == old('tipo_documento') ? 'selected' : '' }}>Tarjeta
                                        de
                                        identidad</option>
                                    <option value="cedula de extranjeria"
                                        {{ 'Cedula de extranjeria' == old('tipo_documento') ? 'selected' : '' }}>Cedula
                                        de
                                        extranjeria</option>
                                    <option value="Otro documento de identidad"
                                        {{ 'Otro documento de identidad' == old('tipo_documento') ? 'selected' : '' }}>
                                        Otro
                                        doumento de identidad</option>
                                    <option value="Permiso especial de permanencia"
                                        {{ 'Permiso especial de permanencia' == old('tipo_documento') ? 'selected' : '' }}>
                                        Permiso especial de permanencia</option>
                                    <option value="Permiso por proteccion temporal"
                                        {{ 'Permiso por proteccion temporal' == old('tipo_documento') ? 'selected' : '' }}>
                                        Permiso por proteccion temporal</option>
                                </select>
                                @error('tipo_documento')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-departamento">
                                <h4 class="titulo">Pais</h4>
                                <select class="munu-departamentos" name="pais_id">
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}"
                                            {{ "$pais->id" == old('pais_id') ? 'selected' : '' }}>
                                            {{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </article>

                            <article class="contenedor-departamento">
                                <h4 class="titulo">Departamento</h4>
                                <select class="munu-departamentos" name="departamento_id">
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}"
                                            {{ "$departamento->id" == old('departamento_id') ? 'selected' : '' }}>
                                            {{ $departamento->nombre }}</option>
                                    @endforeach
                                </select>
                            </article>

                            <article class="contenedor-departamento">
                                <h4 class="titulo">Municipio</h4>
                                <select class="munu-departamentos" name="municipio_id"
                                    value="{{ old('municipio_id') }}">
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}"
                                            {{ "$municipio->id" == old('municipio_id') ? 'selected' : '' }}>
                                            {{ $municipio->nombre }}</option>
                                    @endforeach
                                </select>
                            </article>

                            <article class="contenedor-genero">
                                <h3 class="titulo">Genero</h3>
                                <select class="menu-generos" name="genero" value="{{ old('genero') }}">
                                    <option value="Masculino" {{ 'Masculino' == old('genero') ? 'selected' : '' }}>
                                        Masculino
                                    </option>
                                    <option value="Femenino" {{ 'Femenino' == old('genero') ? 'selected' : '' }}>
                                        Femenino
                                    </option>
                                </select>
                                @error('genero')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-estado">
                                <h3 class="titulo">Estado civil</h3>
                                <select class="menu-estado-civil" name="estado_civil"
                                    value="{{ old('estado_civil') }}">
                                    <option value="Soltero" {{ 'Soltero' == old('estado_civil') ? 'selected' : '' }}>
                                        Soltero
                                    </option>
                                    <option value="Casado" {{ 'Casado' == old('estado_civil') ? 'selected' : '' }}>
                                        Casado
                                    </option>
                                    <option value="Union de hecho"
                                        {{ 'Union de echo' == old('estado_civil') ? 'selected' : '' }}>Union de hecho
                                    </option>
                                    <option value="Seoarado" {{ 'Seorado' == old('estado_civil') ? 'selected' : '' }}>
                                        Seorado
                                    </option>
                                    <option value="Divorciado"
                                        {{ 'Divorciado' == old('estado_civil') ? 'selected' : '' }}>
                                        Divorciado</option>
                                    <option value="Viudo" {{ 'Viudo' == old('estado_civil') ? 'selected' : '' }}>Viudo
                                    </option>
                                </select>
                                @error('estado_civil')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-fecha">
                                <h3 class="titulo">Fecha nacimiento</h3>
                                <input class="input" type="date" name="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento') }}" />
                                @error('fecha_nacimiento')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-direccion">
                                <h3 class="titulo">Direccion</h3>
                                <input class="input" type="text" name="direccion"
                                    value="{{ old('direccion') }}" />
                                @error('direccion')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-telefono">
                                <h3 class="titulo">Telefono</h3>
                                <input class="input" type="tel" name="telefono"
                                    value="{{ old('telefono') }}" />
                                @error('telefono')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-email">
                                <h3 class="titulo">Correo electronico</h3>
                                <input class="input" type="email" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-contraseña">
                                <h3 class="titulo">Contraseña</h3>
                                <input class="input" type="password" name="password"
                                    value="{{ old('password') }}" />
                                @error('password')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                        </article>

                        
                        <article class="contenedor-titulo-profesion">
                            <article class="contenedor">
                                <i class="fa-solid fa-book" style="color: #ffffff;"></i>
                                <h1 class="titulo">Datos sobre su profesion</h1>
                            </article>
                            <h1 class="linea"></h1>
                        </article>

                        <article class="segunda">
                            <article class="contenedor-titulado">
                                <h1 class="titulo">Titulado</h1>
                                <input class="input" type="text" name="titulado" value="{{ old('titulado') }}">
                                @error('titulado')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-institucion">
                                <h1 class="titulo">Institucion egresado</h1>
                                <input class="input" type="text" name="institucion"
                                    value="{{ old('institucion') }}">
                                @error('institucion')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="contenedor-documento">
                                <h1 class="titulo">Diploma</h1>
                                <article class="texto">
                                    <i class="fa-solid fa-download" style="color: #000000;"></i>
                                    <label for="input">Archivo</label>
                                    <input id="input" class="input" type="file" name="documento">
                                    @error('documento')
                                        <strong class="mensaje">{{ $message }}</strong>
                                    @enderror
                                </article>
                            </article>

                            <article class="contenedor-perfil">
                                <article class="perfil">
                                    <h1 class="titulo">Perfil profesional</h1>
                                    <textarea class="input" name="perfil_profesional" cols="70" rows="3"
                                        placeholder="En este campo podras redactar tu como persona como te sientes en el ambito profesional y el ser un profesional">{{ old('perfil_profesional') }}</textarea>
                                </article>
                            </article>
                        </article>

                        <!-- Este input no se muestra en la vista pero corresponde a que el campo
                        role_id en esta vista sera por defecto dos que corresponde al rol candidato -->
                        <input type="number" name="role_id" value="3" hidden>
                    </section>

                    <section class="contenedor-boton">
                        <a class="atras" href="{{ route('super.index') }}">Atras</a>
                        <input class="input" type="submit" value="Registrar" />
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
