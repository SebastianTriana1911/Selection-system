<!-- DASHBOARD DEL CANDIDATO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/seleccionador/vincular.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Vincular Seleccionador</title>
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

        <section class="contenedor-content">
            <article class="nav">
                <article class="conjunto">
                    <article class="cantidad">
                        <h1>Cantidad de empresas: {{ $cantidad }}</h1>
                    </article>
                    <article class="contenedor-titulo">
                        <h1>Lista de empresas disponibles para postularse</h1>
                        <h1 class="linea"></h1>
                    </article>
                    <article>
                        <h1></h1>
                    </article>
                </article>
            </article>

            <article class="content">
                <article class="contenedor-vacante">
                    <article class="vacantes">
                        @forelse($empresas as $empresa)
                            <article class="informacion-vacante">
                                <article class="grid-2">
                                    <article class="contenedor-cargo">
                                        <h1 class="titulo">{{ $empresa->nit }} / {{ $empresa->nombre }}</h1>
                                    </article>

                                    <article class="info">
                                        <article class="contenedor-1">
                                            <article class="contenedor-responsable">
                                                <h1>Responsable legal</h1>
                                                <p>{{ $empresa->responsable_legal }}</p>
                                            </article>

                                            <article class="contenedor-producto">
                                                <h1>Producto-servicio</h1>
                                                <p>{{ $empresa->producto_servicio }}</p>
                                            </article>

                                            <article class="contenedor-salario">
                                                <h1>Direccion</h1>
                                                <p>{{ $empresa->direccion }}</p>
                                            </article>

                                            <article class="reclutador-seleccionador">
                                                @php
                                                    $reclutadores = $empresa->reclutador;
                                                    $seleccionadores = $empresa->seleccionador;
                                                    $contador = 0;

                                                    foreach ($reclutadores as $reclutador) {
                                                        $contador = $contador + 1;
                                                    }

                                                    foreach ($seleccionadores as $seleccionador) {
                                                        $contador = $contador + 1;
                                                    }
                                                @endphp
                                                <h1>Reclutadores / Seleccionadores</h1>
                                                <p>Cantidad de integrantes {{ $contador }}</p>
                                            </article>
                                        </article>

                                        <article class="contenedor-2">
                                            <article class="contenedor-correo">
                                                <h1>Correo electronico</h1>
                                                <p>{{ $empresa->correo_electronico }}</p>
                                            </article>

                                            <article class="contenedor-telefono">
                                                <h1>Telefono</h1>
                                                <p>{{ $empresa->telefono }}</p>
                                            </article>

                                            <article class="contenedor-num-vac">
                                                @php
                                                    $vacantes = $empresa->vacante;
                                                    $numVacantes = 0;

                                                    foreach ($vacantes as $vacante) {
                                                        $numVacantes = $numVacantes + 1;
                                                    }
                                                @endphp
                                                <h1>Vacantes creadas</h1>
                                                <p>Cantidad de vacantes {{ $numVacantes }}</p>
                                            </article>
                                            <article class="contenedor-boton-vacante">
                                                <form
                                                    action="{{ route('seleccionador.vincular', ['id' => $empresa->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="boton">
                                                        <i class="fa-solid fa-user-plus"></i>
                                                    </button>
                                                </form>
                                            </article>
                                        </article>
                                    </article>

                                </article>
                            </article>
                        @empty
                            <article class="contenedor-empty">
                                <h1 class="empty">No hay empresas registradas en el sistema</h1>
                            </article>
                        @endforelse
                    </article>
                </article>

                <article class="boton">
                    <a href="{{ route('login') }}">Volver</a>
                </article>
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
