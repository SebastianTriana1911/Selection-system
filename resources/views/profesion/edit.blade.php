<!-- VISTA PARA ACTUALIZAR UNA PROFESION -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/profesion/edit.css') }}">
    <title>Actualizar profesiones</title>
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

            <section class="content">
                <article class="contenedor-titulo">
                    <h1 class="titulo-principal">{{ $titulo }}</h1>
                    <h1 class="linea"></h1>
                </article>

                <form class="contenedor-hoja-vida" action="{{ route('profesion.update', ['id' => $profesion->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <section class="primera-linea">
                        <article class="Nombre">
                            <h1>Titulado</h1>
                            <input class="input" type="text" name="titulado"
                                value="{{ old('titulado', $profesion->titulado) }}" />
                            @error('titulado')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="descripcion">
                            <h1>Institucion</h1>
                            <input class="input" type="text" name="institucion"
                                value="{{ old('institucion', $profesion->institucion) }}">
                            @error('institucion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-documento">
                            <h1 class="titulo">Diploma</h1>
                            <article class="texto">
                                <i class="fa-solid fa-download" style="color: #000000;"></i>
                                <label for="input">Archivo</label>
                                <input id="input" class="label-input" type="file" name="documento">
                            </article>
                            @error('documento')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>
                    </section>

                    <section class="contenedor-boton">
                        <a class="input-1"
                            href="{{ route('profesion.create', ['idInstructor' => $idInstructor, 'idUsuario' => $idUsuario]) }}">Volver</a>
                        <input class="input-2" type="submit" value="Actualizar">
                    </section>
                </form>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo">
                    <h1 class="titulo-principal">Datos sobre la profesion</h1>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-cuadro">
                    <article class="contenido">
                        <article class="contenedor-titulado">
                            <h1 class="titulo">Titulado</h1>
                            <p class="valor">{{ $profesion->titulado }}</p>
                        </article>

                        <article class="contenedor-titulado">
                            <h1 class="titulo">Institucion egresado</h1>
                            <p class="valor">{{ $profesion->institucion }}</p>
                        </article>

                        <article class="contenedor-titulado">
                            <h1 class="titulo">Documento de comprobacion</h1>
                            <a class="valor-a"
                                href="{{ asset('storage/' . basename($profesion->documento)) }}"
                                target="_blank">Documento comprobante</a>
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
