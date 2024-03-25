<!-- VISTA PARA CREAR UNA EMPRESA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reclutador/crearEmpresa.css') }}">
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Registrar empresa</title>
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

            <article class="contenedor-titulo">
                <article class="contenedor">
                    <i class="fa-regular fa-building"></i>
                    <h1 class="titulo-principal">Formulario para registrar empresas</h1>
                </article>
                <h1 class="linea"></h1>
            </article>

            <form class="contenedor-hoja-vida" action="{{ route('empresa.store') }}" method="POST">
                @csrf
                <section class="info">

                    <article class="contenedor-nit">
                        <h1>Nit empresa</h1>
                        <input class="input" type="text" name="nit" value="{{ old('nit') }}" />
                        @error('nit')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-nombre">
                        <h1>Nombre</h1>
                        <input class="input" type="text" name="nombre" value="{{ old('nombre') }}" />
                        @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-tipo">
                        <h1>Tipo de empresa</h1>
                        <select class="tipo_empresa" name="tipo_empresa">
                            <option value="Corporacion" {{ 'Corporacion' == old('tipo_empresa') ? 'selected' : '' }}>
                                Corporación
                            </option>
                            <option value="Pequeña empresa"
                                {{ 'Pequeña empresa' == old('tipo_empresa') ? 'selected' : '' }}>Pequeña Empresa
                            </option>
                            <option value="Mediana empresa"
                                {{ 'Mediana empresa' == old('tipo_empresa') ? 'selected' : '' }}>Mediana Empresa
                            </option>
                            <option value="Startup" {{ 'Startup' == old('tipo_empresa') ? 'selected' : '' }}>
                                Startup</option>
                            <option value="Sin fines de lucro"
                                {{ 'Sin fines de lucro' == old('tipo_empresa') ? 'selected' : '' }}>Sin Fines de Lucro
                            </option>
                            <option value="Privada" {{ 'Privada' == old('tipo_empresa') ? 'selected' : '' }}>
                                Empresa Privada</option>
                            <option value="Publica" {{ 'Publica' == old('tipo_empresa') ? 'selected' : '' }}>
                                Empresa Pública</option>
                        </select>
                    </article>

                    <article class="contenedor-telefono">
                        <h1>Telefono</h1>
                        <input class="input" type="text" name="telefono" value="{{ old('telefono') }}">
                        @error('telefono')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-correo">
                        <h1>Correo electronico</h1>
                        <input class="input" type="email" name="correo_electronico"
                            value="{{ old('correo_electronico') }}">
                        @error ('correo_electronico')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-responsable">
                        <h1>Nombre del responsable legal</h1>
                        <input class="input" type="text" name="responsable_legal"
                            value="{{ old('responsable_legal') }}">
                        @error('responsable_legal')
                            <strong class="mensaje">{{$message}}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-direccion">
                        <h1>Direccion</h1>
                        <input class="input" type="text" name="direccion" value="{{ old('direccion') }}">
                        @error('direccion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-producto">
                        <h1>Producto o servicio de la empresa</h1>
                        <select class="producto_servicio" name="producto_servicio">
                            <option value="Electrónicos"
                                {{ 'Electrónicos' == old('producto_servicio') ? 'selected' : '' }}>Electrónicos
                            </option>
                            <option value="Ropa y Accesorios"
                                {{ 'Ropa y Accesorios' == old('producto_servicio') ? 'selected' : '' }}>Ropa y
                                Accesorios
                            </option>
                            <option value="Alimentos y Bebidas"
                                {{ 'Alimentos y Bebidas' == old('producto_servicio') ? 'selected' : '' }}>Alimentos y
                                Bebidas</option>
                            <option value="Muebles y Decoración"
                                {{ 'Muebles y Decoración' == old('producto_servicio') ? 'selected' : '' }}>Muebles y
                                Decoración</option>
                            <option value="Juguetes y Artículos para Niños"
                                {{ 'Juguetes y Artículos para Niños' == old('producto_servicio') ? 'selected' : '' }}>
                                Juguetes y
                                Artículos para Niños</option>
                            <option value="Automóviles y Accesorios"
                                {{ 'Automóviles y Accesorios' == old('producto_servicio') ? 'selected' : '' }}>
                                Automóviles y Accesorios</option>
                            <option value="Herramientas y Equipamiento"
                                {{ 'Herramientas y Equipamiento' == old('producto_servicio') ? 'selected' : '' }}>
                                Herramientas y Equipamiento</option>
                            <option value="Productos de Belleza y Cuidado Personal">Productos de Belleza y Cuidado
                                Personal</option>
                            <option value="Artículos Deportivos"
                                {{ 'Artículos Deportivos' == old('producto_servicio') ? 'selected' : '' }}>
                                Artículos Deportivos</option>
                            <option value="Tecnología de la Información (TI)"
                                {{ 'Tecnología de la Información (TI)' == old('producto_servicio') ? 'selected' : '' }}>
                                Tecnología
                                de la Información (TI)</option>
                            <option value="Salud y Cuidado Personal"
                                {{ 'Salud y Cuidado Personal' == old('producto_servicio') ? 'selected' : '' }}>
                                Salud y Cuidado Personal</option>
                            <option value="Educación" {{ 'Educación' == old('producto_servicio') ? 'selected' : '' }}>
                                Educación</option>
                            <option value="Finanzas" {{ 'Finanzas' == old('producto_servicio') ? 'selected' : '' }}>
                                Finanzas</option>
                            <option value="Viajes y Turismo"
                                {{ 'Viajes y Turismo' == old('producto_servicio') ? 'selected' : '' }}>Viajes y Turismo
                            </option>
                            <option value="Hostelería y Restaurantes"
                                {{ 'Hostelería y Restaurantes' == old('producto_servicio') ? 'selected' : '' }}>
                                Hostelería y Restaurantes</option>
                            <option value="Publicidad y Marketing"
                                {{ 'Publicidad y Marketing' == old('producto_servicio') ? 'selected' : '' }}>Publicidad
                                y Marketing</option>
                            <option value="Consultoría Empresarial"
                                {{ 'Consultoría Empresarial' == old('producto_servicio') ? 'selected' : '' }}>
                                Consultoría Empresarial</option>
                            <option value="Servicios Legales"
                                {{ 'Servicios Legales' == old('producto_servicio') ? 'selected' : '' }}>Servicios
                                Legales</option>
                            <option value="Servicios de Mantenimiento del Hogar"
                                {{ 'Servicios de Mantenimiento del Hogar' == old('producto_servicio') ? 'selected' : '' }}>
                                Servicios de Mantenimiento del Hogar
                            </option>
                        </select>
                    </article>

                    <article class="contenedor-pais">
                        <h1>Pais</h1>
                        <select class="menu-pais">
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->id }}"
                                    {{ "$pais->nombre" == old('menu-pais') ? 'selected' : '' }}>
                                    {{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                    </article>

                    <article class="contenedor-departamento">
                        <h1>Departamento</h1>
                        <select class="menu-departamentos">
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}"
                                    {{ "$departamento->nombre" == old('menu-departamentos') ? 'selected' : '' }}>
                                    {{ $departamento->nombre }}</option>
                            @endforeach
                        </select>
                    </article>

                    <article class="contenedor-municipio">
                        <h1>Municipio</h1>
                        <select class="menu-municipio" name="municipio_id" value="{{ old('municipio_id') }}">
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}"
                                    {{ "$municipio->nombre" == old('menu-municipio') ? 'selected' : '' }}>
                                    {{ $municipio->nombre }}</option>
                            @endforeach
                        </select>
                        @error('municipio_id')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <section class="contenedor-boton">
                        <a class="input-1" href="{{ route('reclutador.index') }}">Atras</a>
                        <input class="input-2" type="submit" value="Crear" />
                    </section>
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
