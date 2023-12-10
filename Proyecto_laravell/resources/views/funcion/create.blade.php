<!-- VISTA PARA CREAR FUNCIONES RELACIONADAS A SU OCUPACION -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/funcion/create.css') }}">
    <title>Create funciones</title>
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
                    <h1 class="titulo-principal">Formulario de funciones</h1>
                    <h1 class="linea"></h1>
                </article>

                <form class="contenedor-hoja-vida" action="{{route('funcion.store', ['id' => $ocupaciones -> id])}}" method="POST">
                    @csrf

                    <section class="primera-linea">
                        <article class="contenedor-encabezado">
                            <h1 class="encabezado">Ocupacion {{$ocupaciones -> nombre}}</h1>
                        </article>

                        <!--------- Campo nombre de la tabla ocupaciones ----------->
                        <article class="funcion">
                            <h1>Funcion de la ocupacion</h1>
                            <input class="input" type="text" name="funcion" placeholder="" value="{{ old('funcion')}}" />
                        </article>
                        <!---------------------------------------------------------->
                    </section>

                    <section class="contenedor-boton">
                        <a class="input-1" href="{{route('ocupacion.create')}}">Volver</a>
                        <input class="input-2" type="submit" value="Crear">
                    </section>
                </form>
            </section>

            <section class="content-2">
                <article class="contenedor-titulo">
                    <h1 class="titulo-principal">Listado de funciones</h1>
                    <h1 class="linea"></h1>
                </article>

                <section class="contenedor-ocupaciones">
                    @forelse($funciones as $funcion)

                        @if($funcion -> ocupacion_id == $ocupaciones -> id)
                        <article class="ocupacion">
                            <article class="parte-1">
                                <i class="fa-solid fa-plus" style="color: black"></i>
                                <a>{{$funcion -> funcion}}</a>
                            </article>

                            <article class="parte-2">
                                <form action="{{route('funcion.destroy', ['id' => $funcion -> id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="buttom">
                                        <i class="fa-solid fa-trash" style="color: black"></i>        
                                    </button>
                                </form>
                                <a class="a" href="{{route('funcion.edit', ['ocupacion' => $ocupaciones -> id, 
                                'id' => $funcion -> id])}}"><i class="fa-solid fa-pen"></i></a>
                            </article>
                        </article>
                        @endif

                        @empty
                        <h1 class="empty">No hay funciones creadas</h1>
                    @endforelse
                        
                </section>
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