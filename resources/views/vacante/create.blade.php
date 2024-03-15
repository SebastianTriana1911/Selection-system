<!-- VISTA PARA CREAR UNA VACANTE DE UNA EMPRESA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/vacante/create.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Create Vacantes</title>
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

        <nav class="nav">
            <article class="contenedor-titulo">
                <h1 class="titulo">Formulario de vacantes para la empresa {{ $empresa->nombre }}</h1>
                <h1 class="linea"></h1>
            </article>
        </nav>

        <!---------------------------------------------------------------->
        <section class="contenedor-content">

            <form class="formulario" action="{{ route('vacante.store') }}" method="POST">
                @csrf

                <article class="encabezado">
                    <article class="contenedor-titulo">
                        <i class="fa-regular fa-newspaper" style="color: #ffffff;"></i>
                        <h1 class="titulo">Datos de la vacante</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="contenedor-datos">
                    <article class="grid-1">
                        <article class="contenedor-codigo">
                            <label for="">
                                <h1 class="titulo">Codigo</h1>
                                <input id="" class="input" type="text" name="codigo"
                                    value="{{ old('codigo') }}">
                            </label>
                            @error('codigo')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-num_vacante">
                            <label for="">
                                <h1 class="titulo">Numero de vacantes</h1>
                                <input class="input" type="text" name="num_vacante"
                                    value="{{ old('num_vacante') }}">
                            </label>
                            @error('num_vacante')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-meses_experiencia">
                            <label for="">
                                <h1 class="titulo">Meses de experiencia</h1>
                                <input class="input" type="text" name="meses_experiencia"
                                    value="{{ old('meses_experiencia') }}">
                            </label>
                            @error('meses_experiencia')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                        <article class="contenedor-salario">
                            <label for="">
                                <h1 class="titulo">Salario</h1>
                                <input class="input" type="text" name="salario" value="{{ old('salario') }}">
                            </label>
                            @error('salario')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>
                    </article>

                    <article class="grid-2">
                        <article class="contenedor-tipo-salatio">
                            <h1 class="titulo">Tipo de salario</h1>
                            <select name="tipo_salario" class="tipo-salario">
                                <option value="Salario fijo">Salario fijo</option>
                                <option value="Salario mixto">Salario mixto</option>
                                <option value="Salario en especie">Salario en especie</option>
                                <option value="Salario en metalico">Salario en metalico</option>
                            </select>
                        </article>

                        <article class="contenedor-tipo-contrato">
                            <h1 class="titulo">Tipo de contrato</h1>
                            <select name="tipo_contrato" class="tipo-contrato">
                                <option value="Contrato por obra o valor">Contrato por obra o valor</option>
                                <option value="Contrato de trabajo a término fijo">Contrato de trabajo a término fijo
                                </option>
                                <option value="Contrato de trabajo a término indefinido">Contrato de trabajo a término
                                    indefinido</option>
                                <option value="Contrato de aprendizaje">Contrato de aprendizaje</option>
                                <option value="Contrato temporal">Contrato temporal</option>
                                <option value="Contrato ocasional o accidental">Contrato ocasional o accidental</option>
                            </select>
                        </article>

                        <article class="contenedor-tipo-jornada">
                            <h1 class="titulo">Tipo de jornada</h1>
                            <select name="tipo_jornada" class="tipo-jornada">
                                <option value="Diurna">Diurna</option>
                                <option value="Nocturna">Nocturna</option>
                                <option value="Mixta">Mixta</option>
                            </select>
                        </article>

                        <input type="number" name="empresa_id" value="{{ $empresa->id }}" hidden>

                        <article class="contenedor-cargos">
                            <h1 class="titulo">Cargo</h1>
                            <select class="cargos" name="cargo_id">
                                @forelse ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                                @empty
                                    <h1>No hay cargos en el sistema</h1>
                                @endforelse
                            </select>
                        </article>
                    </article>
                </article>

                <article class="contenedor-ubicacion">
                    <article class="encabezado">
                        <article class="contenedor-titulo">
                            <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                            <h1 class="titulo">Datos de la ubicacion</h1>
                        </article>
                        <h1 class="linea-2"></h1>
                    </article>

                    <article class="grid">
                        <article class="contenedor-pais">
                            <h1>Pais</h1>
                            <select class="paises" name="">
                                @forelse ($paises as $pais)
                                    <option value="">{{ $pais->nombre }}</option>
                                @empty
                                    <h1>No hay paises en el sistema</h1>
                                @endforelse
                            </select>
                        </article>

                        <article class="contenedor-departamentos">
                            <h1>Departamento</h1>
                            <select class="departamento">
                                @forelse ($departamentos as $departamento)
                                    <option>{{ $departamento->nombre }}</option>
                                @empty
                                    <h1>No hay departamentos en el sistema</h1>
                                @endforelse
                            </select>
                        </article>

                        <article class="contenedor-municipios">
                            <h1>Municipio</h1>
                            <select class="municipio" name="municipio_id">
                                @forelse ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                @empty
                                    <h1>No hay municipios en el sistema</h1>
                                @endforelse
                            </select>
                        </article>
                    </article>
                </article>

                <article class="contenedor-educacion-requerida">

                    <article class="encabezado">
                        <article class="contenedor-titulo">
                            <i class="fa-solid fa-school" style="color: #ffffff;"></i>
                            <h1 class="titulo">Datos de educacion requerida</h1>
                        </article>
                        <h1 class="linea"></h1>
                    </article>

                    <article class="parrafo">
                        <h1>Atencion</h1>
                        <p>En este espacio podras colocar el nivel de educacion que requiere la vacante con una
                            descripcion de esta, el campo de puntuacion sera la ponderacion que tendra el candidato si
                            cumple con el nivel de educacion que se requiere</p>
                    </article>

                    <article class="grid">
                        <article class="linea-1">
                            <article class="contenedor-nivel">
                                <h1 class="titulo">Nivel de educacion</h1>
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


                            <article class="contenedor-puntos">
                                <h1 class="titulo">Puntuacion para la educacion</h1>
                                <input class="puntos" type="number" name="puntos" min="1" max="10"
                                    value="{{ old('puntos') }}">
                                @error('puntos')
                                    <strong class="mensaje">{{ $message }}</strong>
                                @enderror
                            </article>
                        </article>

                        <article class="linea-2">
                            <article class="contenedor-titulado">
                                <h1 class="titulo">Titulado requerido</h1>
                                <input class="titulado" type="text" name="titulado"
                                    value="{{ old('titulado') }}">
                                @error('titulado')
                                    <strong class="mensaje-titulado">{{ $message }}</strong>
                                @enderror
                            </article>
                        </article>
                    </article>

                    <article class="contenedor-descripcion">
                        <h1>Descripcion de la educacion que se debe tener</h1>
                        <textarea class="descripcion" name="descripcion" cols="40" rows="7">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                </article>
                <article class="contenedor-boton">
                    <a class="input-1" href="{{ route('reclutador.index') }}">Volver</a>
                    <input class="input-2" type="submit" value="Crear">
                </article>
            </form>
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
