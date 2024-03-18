<!-- VISTA PARA CREAR Y LAS OCUPACIONES -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/educacionVacante/edit.css') }}">
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Actualizar educacion vacante</title>
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
                        <h1 class="titulo-principal">Formulario para actualizar educacion</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-centrar">
                    <form class="contenedor-hoja-vida"
                        action="{{ route('eduvacante.update', ['educacion' => $educacion->id, 'vacante' => $vacante->id]) }}"
                        method="POST">
                        @csrf
                        @method('put')

                        <section class="primera-linea">
                            <article class="educacion">
                                <h1>Nivel de educacion</h1>
                                <select class="nivel" name="nivel_estudio">
                                    <option value="Bachiller"
                                        {{ $educacion->nivel_estudio == 'Bachiller' ? 'selected' : '' }}>
                                        Bachiller</option>
                                    <option value="Tecnico"
                                        {{ $educacion->nivel_estudio == 'Tecnico' ? 'selected' : '' }}>
                                        Tecnico</option>
                                    <option value="Tecnologo"
                                        {{ $educacion->nivel_estudio == 'Tecnologo' ? 'selected' : '' }}>
                                        Tecnologo</option>
                                    <option value="Pregrado"
                                        {{ $educacion->nivel_estudio == 'Pregrado' ? 'selected' : '' }}>
                                        Pregrado</option>
                                    <option value="Posgrado"
                                        {{ $educacion->nivel_estudio == 'Posgrado' ? 'selected' : '' }}>
                                        Posgrado</option>
                                    <option value="Especializacion"
                                        {{ $educacion->nivel_estudio == 'Especializacion' ? 'selected' : '' }}>
                                        Especializacion
                                    </option>
                                    <option value="Doctorado"
                                        {{ $educacion->nivel_estudio == 'Doctorado' ? 'selected' : '' }}>
                                        Doctorado</option>
                                </select>
                            </article>

                            <article class="puntos">
                                <h1>Titulado</h1>
                                <input class="input" type="text" name="titulado"
                                    value="{{ old('titulado', $educacion->titulado) }}">
                                @error('titulado')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="puntos">
                                <h1>Puntos</h1>
                                <input class="input" type="number" name="puntos" min="1" max="10"
                                    value="{{ old('puntos', $educacion->puntos) }}">
                                @error('puntos')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="descripcion">
                                <h1>Descripcion</h1>
                                <textarea name="descripcion" rows="4">{{ old('descripcion', $educacion->descripcion) }}</textarea>
                            </article>
                            @error('descripcion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror

                            <input type="text" name="vacante_id" value="{{ $vacante->id }}" hidden>

                        </section>

                        <section class="contenedor-boton">
                            <a class="input-1"
                                href="{{ route('eduvacante.create', ['vacante' => $vacante->id, 'empresa' => $empresa->id]) }}">Volver</a>
                            <input class="input-2" type="submit" value="Actualizar">
                        </section>
                    </form>
                </article>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo-2">
                    <article class="contenedor">
                        <i class="fa-solid fa-eye"></i>
                        <h1 class="titulo-principal">Descripcion de la educacion</h1>
                    </article>
                    <h1 class="linea-2"></h1>
                </article>

                <article class="contenedor-grande">
                    <section class="contenedor-ocupaciones">

                        <article class="info">
                            <article class="nivel">
                                <h1 class="titulo">Nivel de educacion</h1>
                                <p>{{ $educacion->nivel_estudio }}</p>
                            </article>

                            <article class="puntos">
                                <h1 class="titulo">Puntos</h1>
                                <p>{{ $educacion->puntos }}</p>
                            </article>

                            <article class="puntos">
                                <h1 class="titulo">Titulado</h1>
                                <p>{{ $educacion->titulado }}</p>
                            </article>

                            <article class="descripcion">
                                <h1 class="titulo">Descripcion de la educacion</h1>
                                @if ($educacion->descripcion == null)
                                    <p>Esta educacion no tiene una descripcion</p>
                                @else
                                    <p>{{ $educacion->descripcion }}</p>
                                @endif
                            </article>

                        </article>
                    </section>
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
