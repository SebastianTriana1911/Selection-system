<!-- VISTA PARA CREAR FUNCIONES RELACIONADAS A SU OCUPACION -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/cargo/show.css') }}">
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Actualizar funciones</title>
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
                        <i class="fa-solid fa-gear"></i>
                        <h1 class="titulo-principal">Formulario para actualizar el cargos</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <form class="contenedor-hoja-vida" action="{{ route('cargo.update', ['id' => $cargo->id]) }}"
                    method="POST">
                    @csrf
                    @method('put')

                    <section class="primera-linea">
                        <article class="cargo">
                            <h1 class="titulo">Nombre del cargo</h1>
                            <input class="input" type="text" name="cargo"
                                value="{{ old('cargo', $cargo->cargo) }}" />
                            @error('cargo')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <section class="contenedor-select">
                            <h1 class="titulo">Ocupaciones</h1>
                            <select class="ocupacion_id" name="ocupacion_id">
                                @forelse($ocupaciones as $ocupacion)
                                    <option class="input" value="{{ $ocupacion->id }}"
                                        {{ $ocupacion->id == $cargo->ocupacion_id ? 'selected' : '' }}>
                                        {{ $ocupacion->nombre }}
                                    </option>
                                @empty
                                    <h1>No hay ocupaciones</h1>
                                @endforelse
                                @error('ocupacion_id')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </select>
                        </section>

                        <article class="descripcion">
                            <h1 class="titulo">Habilidades</h1>
                            <textarea name="habilidad">{{ old('habilidad', $cargo->habilidad) }}</textarea>
                            @error('habilidad')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="descripcion-1">
                            <h1 class="titulo">Competencias</h1>
                            <textarea name="competencia" rows="2">{{ old('competencia', $cargo->competencia) }}</textarea>
                            @error('competencia')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>
                    </section>

                    <section class="contenedor-boton">
                        <a class="input-1" href="{{ route('cargo.create', ['id' => $cargo->empresa_id]) }}">Volver</a>
                        <input class="input-2" type="submit" value="Actualizar">
                    </section>
                </form>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo">
                    <article class="contenedor">
                        <i class="fa-solid fa-down-long"></i>
                        <h1 class="titulo-principal">Datos sobre el cargo a actualizar</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-grande">
                    <article class="contenedor-show">
                        <article class="primera-linea">

                            <article class="ocupacion">
                                <h1 class="titulo">Ocupacion</h1>
                                <p class="info">{{ $cargo->ocupacion->nombre }}</p>
                            </article>

                            <article class="empresa">
                                <h1 class="titulo">Empresa</h1>
                                <p class="info">{{ $cargo->empresa->nombre }}</p>
                            </article>

                            <article class="habilidades">
                                <h1 class="titulo">Habilidades</h1>
                                <p class="info">{{ $cargo->habilidad }}</p>
                            </article>

                            <article class="competencia">
                                <h1 class="titulo">Competencias</h1>
                                <p class="info">{{ $cargo->competencia }}</p>
                            </article>

                            <article class="funciones">
                                <h1 class="titulo">Funciones</h1>

                                @forelse($cargo->ocupacion->funcion as $funciones)
                                    <ul>
                                        <li>{{ $funciones->funcion }}</li>
                                    </ul>
                                @empty
                                    <p class="empty">La ocupacion no cuenta con funciones</p>
                                @endforelse
                            </article>

                        </article>
                    </article>
                </article>

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
