<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/candidatoEducacion/index.css') }}">
    <title>Index educacion</title>
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
                <h1>Formulario de educaciones</h1>
                <h1 class="linea"></h1>
            </article>

            <article class="contenedor-padre-formulario">
                <form class="contenedor-formulario" action="{{route('educacionCandidato.store', ['id' => $candidato->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <article class="contenedor-nivel">
                        <h1>Nivel de estudio</h1>
                        <select class="nivel" name="nivel_estudio">
                            <option value="Bachiller">Bachiller</option>
                            <option value="Tecnico">Tecnico</option>
                            <option value="Tecnologo">Tecnologo</option>
                            <option value="Pregrado">Pregrado</option>
                            <option value="Posgrado">Posgrado</option>
                            <option value="Especializacion">Especializacion</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </article>

                    <article class="contenedor-institucion">
                        <h1>Institucion egresado</h1>
                        <input class="institucion" type="text" name="institucion" value="{{old('institucion')}}">
                        @error('institucion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-titulado">
                        <h1>Titulado</h1>
                        <input class="titulado" type="text" name="titulado" value="{{old('titulado')}}">
                        @error('titulado')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-documento">
                        <h1 class="titulo">Diploma</h1>
                        <article class="texto">
                            <i class="fa-solid fa-download" style="color: #000000;"></i>
                            <label for="input">Archivo</label>
                            <input id="input" class="label-input" type="file" name="documento" value="{{old('documento')}}">
                        </article>
                        @error('documento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-inicio">
                        <h1>Año de inicio</h1>
                        <input class="fecha-inicio" type="date" name="año_inicio" value="{{old('año_inicio')}}">
                        @error('año_inicio')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-fin">
                        <h1>Año de finalizacion</h1>
                        <input class="fecha-fin" type="date" name="año_finalizacion" value="{{old('año_finalizacion')}}">
                        @error('año_finalizacion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-boton">
                        <a href="{{ route('candidato.index') }}">Volver</a>
                        <input class="enviar" type="submit" value="Crear">
                    </article>

                </form>
            </article>
        </section>

        <section class="content-2">
            <article class="contenedor-titulo">
                <h1>{{ $titulo }} {{ $candidato->user->nombre }} esta es su
                    educacion</h1>
                <h1 class="linea"></h1>
            </article>

            <section class="contenedor-educacion">
                @forelse ($educaciones as $educacion)
                    <article class="ocupacion">
                        <article class="parte-1">
                            <i class="fa-solid fa-gear" style="color: black"></i>
                            <a href="{{route('educacionCandidato.edit', ['id' => $educacion->id])}}">{{ $educacion->nivel_estudio }}</a>
                        </article>

                        <article class="parte-2">
                            <form action="{{route('educacionCandidato.destroy', ['id' => $educacion->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="buttom">
                                    <i class="fa-solid fa-trash" style="color: black"></i>
                                </button>
                            </form>
                        </article>
                    </article>
                @empty
                    <article class="contenedor-empty">
                        <h1 class="empty">Usted no cuenta con educaciones registradas</h1>
                    </article>
                @endforelse
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
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="william">
                        <h3>William Lozano</h3>
                        <span>3153504473</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="peter">
                        <h3>Peter Bustamante</h3>
                        <span>3044479143</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </section>
                    </article>

                    <article class="capera">
                        <h3>Diego Capera</h3>
                        <span>3005301839</span>

                        <section class="apps">
                            <a href="https://www.facebook.com/profile.php?id=100025316872756" target="-blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="-blank">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/sebastian___1911/?hl=es-la" target="-blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="-blank">
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
