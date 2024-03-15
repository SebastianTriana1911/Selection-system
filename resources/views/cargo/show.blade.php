<!-- VISTA PARA CREAR FUNCIONES RELACIONADAS A SU OCUPACION -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/cargo/show.css') }}">
    <title>Update funciones</title>
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
                    <h1 class="titulo-principal">Formulario de actualizacion</h1>
                    <h1 class="linea"></h1>
                </article>

                <form class="contenedor-hoja-vida" action="{{ route('cargo.update', ['id' => $cargo->id]) }}"
                    method="POST">
                    @csrf
                    @method('put')

                    <section class="primera-linea">

                        <section class="linea-1">
                            <!--------- Campo nombre de la tabla cargos ----------->
                            <article class="cargo">
                                <h1 class="titulo">Nombre del cargo</h1>
                                <input class="input" type="text" name="cargo" placeholder=""
                                    value="{{ old('cargo', $cargo->cargo) }}" />
                                @error('cargo')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>

                            <section class="contenedor-select">
                                <h1 class="titulo">Ocupaciones</h1>
                                <select class="ocupacion_id" name="ocupacion_id">
                                    @forelse($ocupaciones as $ocupacion)
                                        <option class="input" value="{{ $ocupacion->id }}">{{ $ocupacion->nombre }}
                                        </option>
                                        @error('ocupacion_id')
                                            <strong class="mensaje">{{ $message }}</strong>
                                        @enderror
                                    @empty
                                        <h1>No hay ocupaciones</h1>
                                    @endforelse
                                </select>
                            </section>
                            <!---------------------------------------------------------->
                        </section>

                        <section class="linea-2">
                            <!------ Campo descripcion de la tabla cargos --------->
                            <article class="descripcion">
                                <h1 class="titulo">Habilidades</h1>
                                <textarea name="habilidad" rows="1">{{ old('habilidad', $cargo->habilidad) }}</textarea>
                                @error('habilidad')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!---------------------------------------------------------->

                            <!------ Campo descripcion de la tabla cargos --------->
                            <article class="descripcion-1">
                                <h1 class="titulo">Competencias</h1>
                                <textarea name="competencia" rows="2">{{ old('competencia', $cargo->competencia) }}</textarea>
                                @error('competencia')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                            <!---------------------------------------------------------->
                        </section>
                    </section>

                    <section class="contenedor-boton">
                        <a class="input-1" href="{{ route('cargo.create', ['id' => $cargo->empresa_id]) }}">Volver</a>
                        <input class="input-2" type="submit" value="Actualizar">
                    </section>
                </form>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo">
                    <h1 class="titulo-principal">{{ $cargo->cargo }}</h1>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-show">

                    <article class="primera-linea">

                        <article class="cont-ocu-empre">
                            <article class="segunda-linea">
                                <article class="ocupacion">
                                    <h1 class="titulo">OCUPACION</h1>
                                    <p class="info">{{ $cargo->ocupacion->nombre }}</p>
                                </article>

                                <article class="id">
                                    <h1 class="titulo">ID</h1>
                                    <p class="info">{{ $cargo->id }}</p>
                                </article>

                                <article class="empresa">
                                    <h1 class="titulo">EMPRESA</h1>
                                    <p class="info">{{ $cargo->empresa->nombre }}</p>
                                </article>
                            </article>
                        </article>
                    </article>

                    <article class="cont-habilidad-competencia">
                        <article class="grid">
                            <article class="segunda-linea">
                                <article class="habilidades">
                                    <h1 class="titulo">HABILIDADES</h1>
                                    <p class="info">{{ $cargo->habilidad }}</p>
                                </article>
                            </article>

                            <article>
                                
                            </article>

                            <article class="segunda-linea">
                                <article class="competencia">
                                    <h1 class="titulo">COMPETENCIAS</h1>
                                    <p class="info">{{ $cargo->competencia }}</p>
                                </article>
                            </article>
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
