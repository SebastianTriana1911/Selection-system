<!-- VISTA PARA CREAR Y LAS OCUPACIONES -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/educacionVacante/create.css') }}">
    <title>Create educacion vacante</title>
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
                    <h1 class="titulo-principal">Formulario de educacion V</h1>
                    <h1 class="linea"></h1>
                </article>

                <form class="contenedor-hoja-vida" action="{{ route('eduvacante.store', ['vacante' => $vacante->id]) }}"
                    method="POST">
                    @csrf

                    <section class="primera-linea">

                        <article class="flex">

                            <article class="educacion">
                                <h1>Nivel de educacion</h1>
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

                            <article class="puntos">
                                <h1>Puntos</h1>
                                <input class="input" type="number" name="puntos" min="1" max="10" 
                                    value="{{ old('puntos') }}">
                                @error('puntos')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <article class="puntos">
                                <h1>Titulado</h1>
                                <input class="input" type="text" name="titulado" value="{{ old('titulado') }}">
                                @error('titulado')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                        </article>

                        <article class="descripcion">
                            <h1>Descripcion</h1>
                            <textarea name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                        </article>
                        @error('descripcion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror

                        <input type="text" name="vacante_id" value="{{ $vacante->id }}" hidden>

                    </section>

                    <section class="contenedor-boton">
                        <a class="input-1" href="{{ route('vacante.index', ['id' => $empresa->id]) }}">Volver</a>
                        <input class="input-2" type="submit" value="Crear">
                    </section>
                </form>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo">
                    <h1 class="titulo-principal">Lista de educaciones requeridas</h1>
                    <h1 class="linea"></h1>
                </article>

                <section class="contenedor-ocupaciones">
                    @forelse ($educaciones as $educacion)
                        <article class="ocupacion">
                            <article class="parte-1">
                                <i class="fa-solid fa-gear" style="color: black"></i>
                                <a
                                    href="{{ route('eduvacante.edit', ['educacion' => $educacion->id, 'vacante' => $vacante->id, 'empresa' => $empresa->id]) }}">{{ $educacion->nivel_estudio }}</a>
                            </article>

                            <article class="parte-2">
                                <form action="{{ route('eduvacante.destroy', ['id' => $educacion->id]) }}"
                                    method="POST">
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
                            <h1 class="empty">No hay educaciones para esta vacante</h1>
                        </article>
                    @endforelse
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
