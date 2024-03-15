<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title></title>
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

        @yield('content')

        <footer class="footer">
            <section class="contenedor-footer">

                    <article class="contenedor-imagen">
                        <img class="logo-png" src="{{ asset('imagenes/Logo-negro.png') }}" alt="Logo"/>
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