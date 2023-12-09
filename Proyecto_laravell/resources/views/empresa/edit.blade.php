<!-- VISTA PARA ACTUALIZAR DATOS DE LA EMPRESA -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/empresa/edit.css') }}">
    <title>Update empresa</title>
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

            <article class="contenedor-titulo">
                <h1 class="titulo-principal">Actualizar datos de la empresa {{$empresa -> nombre}}</h1>
                <h1 class="linea"></h1>
            </article>

            <form class="contenedor-hoja-vida" action="{{route('empresa.update', ['id' => $empresa -> id])}}" method="POST">
                @csrf

                @method('put')
                <section class="primera-linea">
                    
                    <section class="linea-1">
                        <!--------- Campo nombre de la tabla empresa -------->
                        <article class="contenedor-nit">
                            <input class="input" type="text" name="nit" placeholder="Nit" value="{{ old('nit', $empresa->nit)}}" />
                        </article>
                        {{-- @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror --}}
                        <!-------------------------------------------------->

                        <!------ Campo num_documento de la tabla empresa --------->
                        <article class="contenedor-nombre">
                            <input class="input" type="text" name="nombre"
                                placeholder="Nombre" value="{{ old('nombre', $empresa->nombre) }}" />
                        </article>
                        {{-- @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror --}}
                        <!------------------------------------------------------>
                    </section>

                    <section class="linea-2">
                        <!--------- Campo direccion de la tabla empresa -------->
                        <article class="contenedor-direccion">
                            <input class="input" type="text" name="direccion" placeholder="Direccion" value="{{ old('direccion', $empresa->direccion) }}" />
                        </article>
                        {{-- @error('direccion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror --}}
                        <!---------------------------------------------------->
                    
                        <!---- Campo pais que corresponde al campo que se ingrese en municipio ---->
                        <article class="contenedor-pais">
                            <select class="menu-pais">
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                        </article>
                        <!------------------------------------------------------------------------->
                    </section>

                    <section class="linea-3">
                        <!---- Campo departamento que corresponde al campo que se ingrese en municipio ---->
                        <article class="contenedor-departamento">
                            <select class="menu-departamentos">
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </select>
                        </article>
                        <!---------------------------------------------------------------------------------->

                        <!--------- Campo municipio_id de la tabla users -------->
                        <article class="contenedor-municipio">
                            <select class="menu-municipio" name="municipio_id" value="{{ old('municipio_id', $empresa->municipio->nombre) }}">
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
                

                <section class="contenedor-boton">
                    <a  class="input-1" href="{{route('empresa.show', ['id' => $empresa -> id])}}">Atras</a>
                    <input class="input-2" type="submit" value="Actualizar"/>
                </section>
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