<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SDN 1 Bedalisodo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("{{ url('img/bg.jpg') }}");
                background-size: cover;
                background-repeat: no-repeat:
                background-color: #fff;
                color: #333;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                background: #333;
                color: #636b6f;
                padding: 5px 10px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links a:hover{
                color: #efefef;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content">
                <div class="title m-b-md" style="text-decoration: underline; font-size: 3rem;padding-top: 20px;">
                   SD Negeri 1 Bedalisodo
                </div>

                <div class="links">
                    <a href="/profil">Profil</a>
                    <a href="/guru">Guru</a>
                    <a href="/siswa-publik">Siswa</a>
                    <a href="/fasilitas">Fasilitas</a>
                    <a href="/ekstrakurikuler">Ekskul</a>
                    <a href="/galeri">Galeri</a>
                    <a href="/blog">Blog</a>
                    <a href="/login">login</a>
                </div>
            </div>
        </div>
    </body>
</html>
