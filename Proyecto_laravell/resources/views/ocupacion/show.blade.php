<!-- VISTA PARA ACTUALIZAR UNA OCUPACION Y VER SUS DATOS -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/ocupacion/show.css') }}">
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Show ocupaciones</title>
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

            <section class="content">

                <article class="contenedor-titulo">
                    <article class="contenedor">
                        <i class="fa-solid fa-rotate-right"></i>
                        <h1 class="titulo-principal">Formulario para actuailizar ocupaciones</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <form class="contenedor-hoja-vida" action="{{ route('ocupacion.update', ['id' => $ocupacion->id]) }}"
                    method="POST">
                    @csrf
                    @method('put')

                    <section class="primera-linea">

                        <article class="codigo">
                            <h1>Codigo de la ocupacion</h1>
                            <input class="input" type="number" name="codigo" min="0"
                                value="{{ old('codigo', $ocupacion->codigo) }}">
                            @error('codigo')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="nombre">
                            <h1>Nombre de la ocupacion</h1>
                            <input type="text" name="nombre" value="{{ old('nombre', $ocupacion->nombre) }}">
                            @error('nombre')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="descripcion">
                            <h1>Descripcion</h1>
                            <textarea name="descripcion" rows="6">{{ old('descripcion', $ocupacion->descripcion) }}</textarea>
                            @error('descripcion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>
                    </section>

                    <section class="contenedor-boton">
                        <a class="input-1" href="{{ route('ocupacion.create', ['id' => $ocupacion->id]) }}">Volver</a>
                        <input class="input-2" type="submit" value="Actualizar">
                    </section>
                </form>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo-2">
                    <article class="contenedor-contenido-2">
                        <i class="fa-solid fa-arrow-down"></i>
                        <h1 class="titulo-principal">Datos de la ocupacion</h1>
                    </article>
                    <h1 class="linea-2"></h1>
                </article>

                <article class="contenedor-show">
                    <article class="info-2">
                        <article class="info-3">
                            <article class="codigo">
                                <h1>Codigo de la ocupacion</h1>
                                <p>{{ $ocupacion->codigo }}</p>
                            </article>

                            <article class="nombre">
                                <h1>Nombre de la ocupacion</h1>
                                <p>{{ $ocupacion->nombre }}</p>
                            </article>

                            <article class="descripcion">
                                <h1>Descripcion</h1>
                                <p>{{ $ocupacion->descripcion }}</p>
                            </article>

                            <article class="funcion">
                                <h1>Funciones de la ocupacion</h1>
                                @forelse ($funciones as $funcion)
                                    <ul>
                                        <li>
                                            <p class="info">● {{ $funcion->funcion }}</p>
                                        </li>
                                    </ul>
                                @empty
                                    <p class="empty">No hay funciones</p>
                                @endforelse
                            </article>
                        </article>
                    </article>
                </article>
            </section>

        </section>

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
