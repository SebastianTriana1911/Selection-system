<!-- VISTA PARA VER TODOS LOS INSTRUCTORES DE LA BD -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/super/showInstructores.css')}}">    
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <title>Listar instructores</title>
</head>
<body>
    <main class="page">

        <header class="header">

            <section class="contenedor-logo">
                <span>S</span><span class="s-amarilla">S</span>
            </section>

            <section class="titulo">
                <span>Selection</span><section class="system">System</section>
            </section>

        </header>

<!---------------------------------------------------------------->

        <nav class="nav">

            <article class="primer-contenedor">
                <h1>Administrador {{$user -> nombre}} {{$user -> apellido}}</h1>
            </article>

            <article class="segundo-contenedor">

                <article class="contenedor-logout">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="boton">Cerrar sesion</button>
                    </form>
                </article>
            </article>
            
        </nav>

<!------------------------------------------------------------------------------------------------------------------------------------>

        <section class="contenedor-content">

            <article class="contenedor-titulo">
                <h1 class="titulo">Listados de instructores</h1>
                <h1 class="barra"></h1>
            </article>

            <article class="contenedor-informacion">

                @forelse($instructores as $instructor)
                    <article class="contenedor-instructor">

                        <article class="contenedor-logo">
                            <i class="fa-solid fa-user" style="color: #000000;"></i>
                        </article>

                        <article class="contenedor-nombre">
                            <h1 class="titulo">{{$instructor->user->nombre}} {{$instructor->user->apellido}}</h1>
                        </article>

                        <form action="{{route('user.destroy', ['id' => $instructor -> user_id])}}" method="POST">
                            @csrf

                            @method('delete')

                            <button class="contenedor-bote">
                                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                            </button>
                        </form>
                    </article>
                    
                    @empty
                    <h3 class="empty">No hay ningun instructor registrado</h3>
                @endforelse
            </article>

            <article class="contenedor-boton">
                <a class="volver" href="{{route('super.index')}}">Volver</a>
            </article>
        </section>
    </main>
</body>
</html>