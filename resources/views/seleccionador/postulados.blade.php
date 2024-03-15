<!-- DASHBOARD DEL CANDIDATO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/seleccionador/postulados.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Show postulados</title>
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
                        <h1>Cantidad de vacantes: {{ $cantidad }}</h1>
                    </article>
                    <article class="contenedor-titulo">
                        <h1>Lista de vacantes creadas por la empresa</h1>
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
                        @forelse($vacantes as $postulacion)
                            <article class="informacion-vacante">

                                <article class="grid-1">
                                    <article class="contenedor-codigo">
                                        @php
                                            $imagen = '';
                                            if ($postulacion->candidato->user->genero == 'Masculino') {
                                                $imagen = '/imagenes/icono-hombre.png';
                                            } else {
                                                $imagen = '/imagenes/icono-mujer.png';
                                            }
                                        @endphp
                                        <article class="contenedor-imagen">
                                            <img src="{{ $imagen }}" alt="icono">
                                        </article>
                                    </article>
                                </article>

                                <article class="grid-2">

                                    <article class="contenedor-cargo">
                                        <h1 class="titulo">{{ $postulacion->candidato->user->nombre }}
                                            {{ $postulacion->candidato->user->apellido }}</h1>
                                    </article>

                                    <article class="info">
                                        <article class="contenedor-salario">
                                            <h1 class="titulo">Num documento:
                                                {{ $postulacion->candidato->user->num_documento }}</h1>
                                        </article>

                                        <article class="contenedor-experiencia">
                                            @php
                                                $fechaCandidato = $postulacion->candidato->fecha_nacimiento;

                                                // Crear objetos DateTime para la fecha de nacimiento y la fecha actual
                                                $fechaNacimiento = new DateTime($fechaCandidato);
                                                $fechaActual = new DateTime();

                                                // Calcular la diferencia entre las fechas
                                                $diferencia = $fechaNacimiento->diff($fechaActual);

                                                // Obtener la edad exacta
                                                $edadExacta = $diferencia->y;
                                            @endphp
                                            <h1 class="titulo">Edad: {{ $edadExacta }} </h1>
                                        </article>

                                        <article class="contenedor-contrato">
                                            <h1 class="titulo">Telefono: {{ $postulacion->candidato->telefono }}</h1>
                                        </article>

                                        <article class="contenedor-lugar">
                                            <h1>{{ $postulacion->candidato->user->municipio->nombre }}
                                                {{ $postulacion->candidato->user->municipio->departamento->nombre }}
                                            </h1>
                                        </article>

                                        <article class="contenedor-num-vac">
                                            <h1 class="titulo">Direccion: {{ $postulacion->candidato->direccion }}</h1>
                                        </article>

                                        <article class="contenedor-postulados">
                                            {{-- @php
                                                $ponderacion = $postulacion->ponderacion;
                                                $lista = [];

                                                foreach($postulacion->ponderacion as $ponderacion){
                                                array_push($lista, $ponderacion->ponderacion);
                                                }
                                            @endphp
                                            @foreach($lista as $ponderaciones)
                                                <h1>Ponderacion: {{$ponderaciones}}</h1>
                                            @endforeach --}}
                                            <h1>Ponderacion: {{$postulacion->ponderacion->ponderacion}}</h1>
                                        </article>

                                    </article>
                                </article>

                                <article class="contenedor-boton-vacante">
                                    <a class="boton" href="">
                                        <i class="fa-solid fa-users"></i>
                                    </a>
                                </article>
                            </article>
                        @empty
                            <article class="contenedor-empty">
                                <h1 class="empty">No hay vacantes registradas</h1>
                            </article>
                        @endforelse
                    </article>
                </article>

                <article class="contenedor-boton">
                    <a href="{{ route('seleccionador.vacante') }}">Volver</a>
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
