<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/candidatoExperiencia/edit.css') }}">
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
    <title>Actualizar experiencia</title>
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
            <article class="content">
                <article class="contenedor-titulo">
                    <article class="contenedor">
                        <i class="fa-solid fa-rotate-right"></i>
                        <h1>Actualizacion de datos sobre la experiencia</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-padre-formulario">
                    <form class="contenedor-formulario"
                        action="{{ route('experienciaCandidato.update', ['id' => $candidatoExperiencia->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <article class="contenedor-nivel">
                            <h1>Nombre de la empresa</h1>
                            <input class="nivel" type="text" name="nombre_empresa"
                                value="{{ old('nombre_empresa', $candidatoExperiencia->nombre_empresa) }}">
                            @error('nombre_empresa')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-institucion">
                            <h1>Meses experiencia</h1>
                            <input class="institucion" type="number" name="meses" min="1"
                                value="{{ old('meses', $candidatoExperiencia->meses) }}">
                            @error('meses')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-documento">
                            <h1 class="titulo">Certificacion laboral</h1>
                            <article class="texto">
                                <i class="fa-solid fa-download" style="color: #000000;"></i>
                                <label for="input">Archivo</label>
                                <input id="input" class="label-input" type="file" name="certificacion_laboral"
                                    value="{{ old('certificacion_laboral', $candidatoExperiencia->certificacion_laboral) }}">
                            </article>
                            @error('certificacion_laboral')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-inicio">
                            <h1>Año de inicio</h1>
                            <input class="fecha-inicio" type="date" name="año_inicio"
                                value="{{ old('año_inicio', $candidatoExperiencia->año_inicio) }}">
                            @error('año_inicio')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-fin">
                            <h1>Año de finalizacion</h1>
                            <input class="fecha-fin" type="date" name="año_finalizacion"
                                value="{{ old('año_finalizacion', $candidatoExperiencia->año_finalizacion) }}">
                            @error('año_finalizacion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-descripcion">
                            <article class="grid">
                                <h1>Descripcion</h1>
                                <p>En este campo podras dar una descripcion corta de su paso por la empresa, su
                                    experiencia
                                    y conocimientos adquiridos</p>
                            </article>
                            <textarea class="titulado" name="descripcion" rows="4">{{ old('descripcion', $candidatoExperiencia->descripcion) }}</textarea>
                            @error('descripcion')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-boton">
                            <a href="{{ route('experienciaCandidado.index', ['id' => $candidato->id]) }}">Volver</a>
                            <input class="enviar" type="submit" value="Actualizar">
                        </article>

                    </form>
                </article>
            </article>

            <section class="content-2">
                <article class="contenedor-titulo-2">
                    <article class="contenedor-contenido-2">
                        <i class="fa-solid fa-eye"></i>
                        <h1>Visualizacion sobre actualizacion</h1>
                    </article>
                    <h1 class="linea-2"></h1>
                </article>

                <article class="contenedor-informacion">
                    <article class="info">
                        <article class="nombre">
                            <h1>Nombre de la empresa</h1>
                            <p>{{ $candidatoExperiencia->nombre_empresa }}</p>
                        </article>

                        <article class="meses">
                            <h1>Meses de experiencia</h1>
                            <p>{{ $candidatoExperiencia->meses }}</p>
                        </article>

                        <article class="certificado">
                            <h1>Certificacion laboral</h1>
                            @php
                                $ruta = $candidatoExperiencia->certificacion_laboral;
                            @endphp
                            <a class="documento" href="{{ asset('storage/' . $ruta) }}" target="_blank">Documento</a>
                        </article>

                        <article class="inicio">
                            <h1>Fecha de inicio</h1>
                            <p>{{ $candidatoExperiencia->año_inicio }}</p>
                        </article>

                        <article class="fin">
                            <h1>Fecha de finalizacion</h1>
                            <p>{{ $candidatoExperiencia->año_finalizacion }}</p>
                        </article>

                        <article class="descripcion">
                            <h1>Descripcion</h1>
                            <article class="p">
                                <p>{{ $candidatoExperiencia->descripcion }}</p>
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
