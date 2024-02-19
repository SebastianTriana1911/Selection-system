<!-- VISTA PARA VER TODAS LAS VACANTES QUE TIENE UNA EMPRESA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/candidato/sintesis.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Sintesis Vacantes</title>
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

        <section class="nav">
            <h1>Sintesis de la vacante</h1>
            <h1 class="linea"></h1>
        </section>

        <!---------------------------------------------------------------->

        <section class="content">
            <article class="division">
                <article class="grid">
                    <article class="informacion">
                        <article class="datos-principales">
                            <article class="contenedor-titulo">
                                <h1>Datos principales</h1>
                                <h1 class="linea"></h1>
                            </article>
                            <article class="info">

                                <article class="codigo">
                                    <h1>Codigo</h1>
                                    <p>{{$vacante->codigo}}</p>
                                </article>

                                <article class="num_vacante">
                                    <h1>Vacantes disponibles</h1>
                                    <p>{{$vacante->num_vacante}}</p>
                                </article>

                                <article class="meses">
                                    <h1>Meses de experiencia</h1>
                                    <p>{{$vacante->meses_experiencia}}</p>
                                </article>

                                <article class="salario">
                                    <h1>Salario</h1>
                                    <p>{{$vacante->salario}}</p>
                                </article>

                                <article class="tipo">
                                    <h1>Tipo de salario</h1>
                                    <p>{{$vacante->tipo_salario}}</p>
                                </article>

                                <article class="contrato">
                                    <h1>Tipo de contrato</h1>
                                    <p>{{$vacante->tipo_contrato}}</p>
                                </article>

                                <article class="jornada">
                                    <h1>Tipo de jornada</h1>
                                    <p>{{$vacante->tipo_jornada}}</p>
                                </article>

                                <article class="empresa">
                                    <h1>Empresa</h1>
                                    <p>{{$vacante->empresa->nombre}}</p>
                                </article>
                            </article>
                        </article>

                        <article class="lugar-ejecucion">
                            <article class="contenedor-titulo">
                                <h1>Lugar de ejecucion</h1>
                                <h1 class="linea"></h1>
                            </article>

                            <article class="info">
                                <article class="pais">
                                    <h1>Pais</h1>
                                    <p>{{$vacante->municipio->departamento->pais->nombre }}</p>
                                </article>
                                <article class="departamento">
                                    <h1>Departamento</h1>
                                    <p>{{$vacante->municipio->departamento->nombre }}</p>
                                </article>
                                <article class="municipio">
                                    <h1>Municipio</h1>
                                    <p>{{$vacante->municipio->nombre }}</p>
                                </article>
                            </article>
                        </article>

                        <article class="datos-cargo">
                            <article class="contenedor-titulo">
                                <h1>Datos sobre el cargo</h1>
                                <h1 class="linea"></h1>
                            </article>

                            <article class="cargo">
                                <h1>Cargo</h1>
                                <p>{{$vacante->cargo->cargo}}</p>
                            </article>

                            <article class="habilidad">
                                <h1>Habilidades</h1>
                                <p>{{$vacante->cargo->habilidad}}</p>
                            </article>

                            <article class="competencia">
                                <h1>Competencias</h1>
                                <p>{{$vacante->cargo->competencia}}</p>
                            </article>

                            <article class="funciones">
                                @forelse ($funciones as $funcion)
                                    <ul>
                                        <li>{{$funcion->funcion}}</li>
                                    </ul>
                                @empty
                                    <p>No hay funciones</p>
                                @endforelse
                            </article>
                        </article>
                    </article>
                </article>
                <article class="grid-2">

                </article>
            </article>
        </section>

        <!---------------------------------------------------------------->

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
