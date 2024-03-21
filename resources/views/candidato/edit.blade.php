<!DOCTYPE html>
<html lang="en">

<head>
    <title>Actualizar informacion</title>
    <link rel="stylesheet" href="{{ asset('css/candidato/edit.css') }}">
    <script src="https://kit.fontawesome.com/10d9a6ff24.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}">
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

        <article class="contenedor-content">
            <form class="contenedor-put" action="{{ route('candidato.update', ['id' => $candidato->id]) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('put')

                <article class="contenedor-titulo">
                    <article class="content">
                        <i class="fa-solid fa-rotate-right" style="color: #ffffff;"></i>
                        <h1 class="titulo">Actualizacion de datos</h1>
                    </article>
                    <h1 class="linea"></h1>
                </article>

                <article class="info">

                    <article class="contenedor-tipo">
                        <h1>Tipo de documento</h1>
                        <select class="menu-identificacion" name="tipo_documento" value="{{ old('tipo_documento') }}">
                            <option value="Cedula de ciudadania"
                            {{$candidato->user->tipo_documento == 'Cedula de ciudadania' ? 'selected' : ''}}>Cedula de ciudadania</option>
                            <option value="Tarjeta de identidad"
                            {{$candidato->user->tipo_documento == 'Tarjeta de identidad' ? 'selected' : ''}}>Tarjeta de identidad</option>
                            <option value="Cedula de extranjeria"
                            {{$candidato->user->tipo_documento == 'Cedula de extranjeria' ? 'selected' : ''}}>Cedula de extranjeria</option>
                            <option value="Otro documento de identidad"
                            {{$candidato->user->tipo_documento == 'Otro documento de identidad' ? 'selected' : ''}}>Otro doumento de identidad</option>
                            <option value="Permiso especial de permanencia"
                            {{$candidato->user->tipo_documento == 'Permiso especial de pertenencia' ? 'selected' : ''}}>Permiso especial de permanencia</option>
                            <option value="Permiso por proteccion temporal"
                            {{$candidato->user->tipo_documento == 'Permiso por proteccion temporal' ? 'selected' : ''}}>Permiso por proteccion temporal</option>
                        </select>
                        @error('tipo_documento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-numero-documento">
                        <h1>Numero de documento</h1>
                        <input type="text" name="num_documento"
                            value="{{ old('num_documento', $candidato->user->num_documento) }}">
                        @error('num_documento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-nombre">
                        <h1>Nombre</h1>
                        <input type="text" name="nombre" value="{{ old('nombre', $candidato->user->nombre) }}">
                        @error('nombre')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-apellido">
                        <h1>Apellido</h1>
                        <input type="text" name="apellido" value="{{ old('apellido', $candidato->user->apellido) }}">
                        @error('apellido')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="genero">
                        <h1>Genero</h1>
                        <select class="menu-generos" name="genero"
                            value="{{ old('genero', $candidato->user->genero) }}">
                            <option value="Masculino" {{$candidato->user->genero == 'Masculino' ? 'selected' : ''}}>Masculino</option>
                            <option value="Femenino" {{$candidato->user->genero == 'Femenino' ? 'selected' : ''}}>Femenino</option>
                        </select>
                        @error('genero')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-estado">
                        <h1>Estado civil</h1>
                        <select class="menu-estado-civil" name="estado_civil"
                            value="{{ old('estado_civil', $candidato->user->estado_civil) }}">
                            <option value="Soltero" 
                            {{$candidato->user->estado_civil == 'Soltero' ? 'selected' : ''}}>Soltero</option>
                            <option value="Casado"
                            {{$candidato->user->estado_civil == 'Casado' ? 'selected' : ''}}>Casado</option>
                            <option value="Union de hecho"
                            {{$candidato->user->estado_civil == 'Union de hecho' ? 'selected' : ''}}>Union de hecho</option>
                            <option value="Seoarado" 
                            {{$candidato->user->estado_civil == 'Seoarado' ? 'selected' : ''}}>Seorado</option>
                            <option value="Divorciado"
                            {{$candidato->user->estado_civil == 'Divorciado' ? 'selected' : ''}}>Divorciado</option>
                            <option value="Viudo" 
                            {{$candidato->user->estado_civil == 'Viudo' ? 'selected' : ''}}>Viudo</option>
                        </select>
                        @error('estado_civil')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-fecha">
                        <h1>Fecha de nacimiento</h1>
                        <input type="date" name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $candidato->fecha_nacimiento) }}">
                        @error('fecha_nacimiento')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-direccion">
                        <h1>Direccion</h1>
                        <input type="text" name="direccion" value="{{ old('direccion', $candidato->direccion) }}">
                        @error('direccion')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-telefono">
                        <h1>Telefono</h1>
                        <input type="text" name="telefono" value="{{ old('telefono', $candidato->telefono) }}">
                        @error('telefono')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-estado">
                        <h1>Estado</h1>
                        <input type="text" value="{{$candidato->estado}}" readonly>
                    </article>

                    <article class="contenedor-avatar">
                        <h1>Foto de perfil</h1>
                            <article class="texto">
                                <i class="fa-solid fa-download" style="color: #000000;"></i>
                                <label for="input">Archivo</label>
                                <input id="input" class="label-input" type="file" name="avatar" value="{{old('avatar')}}" accept="image/*">
                            </article>
                            @error('avatar')
                                <strong class="mensaje">{{ $message }}</strong>
                            @enderror
                        </article>

                    <article class="contenedor-email">
                        <h1>Email</h1>
                        <input type="email" name="email" value="{{ old('email', $candidato->user->email) }}">
                        @error('email')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                    <article class="contenedor-sobre-mi">
                        <h1>Sobre mi</h1>
                        <textarea name="perfil_ocupacional" cols="30" rows="6">{{ old('perfil_ocupacional', $candidato->perfil_ocupacional) }}</textarea>
                        @error('perfil_ocupacional')
                            <strong class="mensaje">{{ $message }}</strong>
                        @enderror
                    </article>

                </article>

                <article class="contenedor-botones">
                    <a class="volver" href="{{ route('candidato.index') }}">Volver</a>
                    <input class="actualizar" type="submit" value="Actualizar">
                </article>

            </form>
        </article>
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
