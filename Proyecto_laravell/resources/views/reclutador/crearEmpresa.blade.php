<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reclutador/crearEmpresa.css') }}">
    <title>Reclutador vista previa</title>
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
            <form class="contenedor-hoja-vida" action="{{route('empresa.store')}}" method="POST">
                @csrf

                <h1 class="titulo">Crear empresa</h1>

                <section class="primera-linea">
                    
                    <section class="linea-1">
                    <!--------- Campo nombre de la tabla users -------->
                    <article class="contenedor-nit">
                        <h4 class="titulo">Nit</h4>
                        <input class="input" type="text" name="nit" placeholder="Ingrese el nit"value="{{ old('nit') }}" />
                    </article>
                    {{-- @error('nombre')
                        <strong class="mensaje">{{ $message }}</strong>
                    @enderror --}}
                    <!-------------------------------------------------->

                        <!------ Campo num_documento de la tabla users --------->
                        <article class="contenedor-nombre">
                            <h4 class="titulo">Nombre</h4>
                            <input class="input" type="text" name="nombre"
                                placeholder="Ingrese el nombre" value="{{ old('nombre') }}" />
                        </article>

                        {{-- @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror --}}
                        <!------------------------------------------------------>

                        <!--------- Campo direccion de la tabla users -------->
                        <article class="contenedor-direccion">
                            <h4 class="titulo">Direccion</h4>
                            <input class="input" type="text" name="direccion" placeholder="Ingrese la direccion" value="{{ old('direccion') }}" />
                        </article>
                        @error('direccion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                        <!---------------------------------------------------->
                    </section>

                    <section class="linea-2">
                        <!---- Campo pais que corresponde al campo que se ingrese en municipio ---->
                        <article class="contenedor-pais">
                            <h4 class="titulo">Pais</h4>
                            <select class="munu-pais">
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                        </article>
                        <!------------------------------------------------------------------------->

                        <!---- Campo departamento que corresponde al campo que se ingrese en municipio ---->
                        <article class="contenedor-departamento">
                            <h4 class="titulo">Departamento</h4>
                            <select class="munu-departamentos">
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </select>
                        </article>
                        <!---------------------------------------------------------------------------------->

                        <!--------- Campo municipio_id de la tabla users -------->
                        <article class="contenedor-municipio">
                            <h4 class="titulo">Municipio</h4>
                            <select class="munu-municipio" name="municipio_id" value="{{ old('municipio_id') }}">
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                        </article>
                        @error('municipio_id')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                        <!--------------------------------------------------------->
                    </section>
                </section>

                <section class="contenedor-boton">
                    <a  class="input" href="#">Postularme</a>
                    <input class="input" type="submit" value="Crear empresa"/>
                </section>

            </form>
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