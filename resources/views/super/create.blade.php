<!-- VISTA PARA CREAR UN ADMINISTRADOR -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Candidato/Css/hoja-vida.css">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/super/create.css') }}">
    <title>Registrar Administrador</title>
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

            <form class="contenedor-hoja-vida" action="{{ route('super.store') }}" method="POST">
                @csrf

                <article class="contenedor-titulo">
                    <article class="titulo">
                        <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        <h1>Formulario para registrar un administrador</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="informacion">

                    <article class="contenedor-nombre">
                        <h3 class="titulo">Nombre</h3>
                        <input class="input" type="text" name="nombre" value="{{ old('nombre') }}" />
                        @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-apellido">
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
                        <select class="menu-identificacion" name="tipo_documento" value="{{ old('tipo_documento') }}">
                            <option value="cedula de ciudadania"
                                {{ 'cedula de ciudadania' == old('tipo_documento') ? 'selected' : '' }}>Cedula de
                                ciudadania</option>
                            <option value="Tarjeta de identidad"
                                {{ 'Tarjeta de identidad' == old('tipo_documento') ? 'selected' : '' }}>Tarjeta de
                                identidad</option>
                            <option value="cedula de extranjeria"
                                {{ 'Cedula de extranjeria' == old('tipo_documento') ? 'selected' : '' }}>Cedula de
                                extranjeria</option>
                            <option value="Otro documento de identidad"
                                {{ 'Otro documento de identidad' == old('tipo_documento') ? 'selected' : '' }}>Otro
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
                        <h1 class="titulo">Pais</h1>
                        <select class="munu-departamentos" name="pais_id">
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}"
                                    {{ "$pais->id" == old('pais_id') ? 'selected' : '' }}>
                                    {{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                    </article>

                    <article class="contenedor-departamento">
                        <h1 class="titulo">Departamento</h1>
                        <select class="munu-departamentos" name="departamento_id">
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}"
                                    {{ "$departamento->id" == old('departamento_id') ? 'selected' : '' }}>
                                    {{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </article>

                    <article class="contenedor-departamento">
                        <h1 class="titulo">Municipio</h1>
                        <select class="munu-departamentos" name="municipio_id" value="{{ old('municipio_id') }}">
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
                            <option value="Masculino" {{ 'Masculino' == old('genero') ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="Femenino" {{ 'Femenino' == old('genero') ? 'selected' : '' }}>Femenino
                            </option>
                        </select>
                        @error('genero')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-estado">
                        <h3 class="titulo">Estado civil</h3>
                        <select class="menu-estado-civil" name="estado_civil" value="{{ old('estado_civil') }}">
                            <option value="Soltero" {{ 'Soltero' == old('estado_civil') ? 'selected' : '' }}>Soltero
                            </option>
                            <option value="Casado" {{ 'Casado' == old('estado_civil') ? 'selected' : '' }}>Casado
                            </option>
                            <option value="Union de hecho"
                                {{ 'Union de echo' == old('estado_civil') ? 'selected' : '' }}>Union de hecho</option>
                            <option value="Seoarado" {{ 'Seorado' == old('estado_civil') ? 'selected' : '' }}>Seorado
                            </option>
                            <option value="Divorciado" {{ 'Divorciado' == old('estado_civil') ? 'selected' : '' }}>
                                Divorciado</option>
                            <option value="Viudo" {{ 'Viudo' == old('estado_civil') ? 'selected' : '' }}>Viudo
                            </option>
                        </select>
                        @error('estado_civil')
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

                    <article class="contenedor-email">
                        <h3 class="titulo">Contraseña:</h3>
                        <input class="input" type="password" name="password" value="{{ old('password') }}" />
                        @error('password')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    

                    <!-- Este input no se muestra en la vista pero corresponde a que el campo
                        role_id en esta vista sera por defecto dos que corresponde al rol candidato -->
                    <input type="number" name="role_id" value="1" hidden>

                </article>
                <section class="contenedor-boton">
                    <a class="atras" href="{{ route('super.index') }}">Atras</a>
                    <input class="input" type="submit" value="Crear Admin" />
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
