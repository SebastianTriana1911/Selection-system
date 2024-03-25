<!-- VISTA DE LA EMPRESA A LA QUE ESTA VINCULADO EL RECLUTADOR -->
<!-- VISTA LOGIN -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/empresa/show.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Ver datos de la empresa</title>
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

        <!---------------------------------------------------------------->

        <section class="content">

            <article class="contenedor-titulo">
                <article class="contenedor">
                    <i class="fa-solid fa-eye"></i>
                    <h1 class="titulo">Informacion de la empresa</h1>
                </article>
                <h1 class="linea"></h1>
            </article>

            <article class="contenedor-informacion">

                <article class="nit">
                    <h1 class="titulo">Nit</h1>
                    <p> {{ $empresa->nit }}</p>
                </article>

                <article class="nombre">
                    <h1 class="titulo">Nombre</h1>
                    <p> {{ $empresa->nombre }}</p>
                </article>

                <article class="responsable">
                    <h1>Responsable legal</h1>
                    <p>{{ $empresa->responsable_legal }}</p>
                </article>

                <article class="tipo">
                    <h1>Tipo de empresa</h1>
                    <p>{{ $empresa->tipo_empresa }}</p>
                </article>

                <article class="direccion">
                    <h1 class="titulo">Direccion</h1>
                    <p> {{ $empresa->direccion }}</p>
                </article>

                <article class="correo">
                    <h1>Correo electronico</h1>
                    <p>{{ $empresa->correo_electronico }}</p>
                </article>

                <article class="telefono">
                    <h1>Telefono</h1>
                    <p>{{ $empresa->telefono }}</p>
                </article>

                <article class="producto">
                    <h1>Producto o servicio</h1>
                    <p>{{ $empresa->producto_servicio }}</p>
                </article>

                <article class="lugar">
                    <h1>Lugar</h1>
                    <p>{{ $empresa->municipio->departamento->nombre }} {{ $empresa->municipio->nombre }}</p>
                </article>

                <article class="reclutadores">
                    <h1 class="titulo">Reclutadores</h1>
                    <p>{{ $contador }}</p>
                </article>

                <article class="seleccionador">
                    <h1 class="titulo">Seleccionador</h1>
                    <p> {{ $contadorSeleccionadores }}</p>
                </article>
            </article>

            <article class="contenedor-boton">
                <a class="boton" href="{{ route('reclutador.index') }}">Volver</a>
                <a class="boton" href="{{ route('empresa.edit', ['id' => $empresa->id]) }}">Actualizar</a>
                <form action="{{ route('empresa.destroy', ['id' => $empresa->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="form">
                        Eliminar
                    </button>
                </form>
            </article>

        </section>

        <!----------------------------------------------------------------->

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
