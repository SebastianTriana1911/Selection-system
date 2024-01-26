<!-- VISTA INDEX DE LA PAGINA -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>Index Selection System</title>
</head>
<body>
    @section('content')
        <section class="contenedor-content">
            <section class="content">
                <section class="informacion">

                    <article class="titulo">
                        <h1>Bienvenido a Selection</h1>
                        <h1 class="system">System</h1>
                    </article>

                        <h1 class="linea-titulo"></h1>
                        <p>Selection System es una aplicación web de software libre, perteneciente al área de análisis y desarrollo de software del SENA la cual será usada para facilitar el proceso de aprendizaje de las personas. Está creada con el fin de entrenar aprendices de talento humano en un entorno relacionado a una agencia pública de empleo.</p>

                    <article class="botones">
                        <a class="registrarse" href="{{route('login')}}">Registrarse</a>
                        <a class="inspeccionar" href="{{route('user.create')}}"">Crear Usuario</a>
                    </article>

                </section>
            </section>
        </section>

        <section class="contenedor-sidebar">
            <section class="sidebar">

                <article class="contenedor-imagen">
                    <img class="imagen" src="{{ asset('imagenes/Logo-blanco.png') }}" alt="Logo"/>
                </article>

            </section>
        </section>
    @endsection
</body>
</html>