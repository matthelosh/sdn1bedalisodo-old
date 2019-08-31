<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

        .btn-sd {
                background: #666;
                color: #ccc;
                padding: 10px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        .btn-sd:hover{
            color: #efefef;
            text-decoration: none;
        }
        .navbar-light .nav-link{
            color: #333!important;
            font-size: 1.1em;
            line-height: 75px!important;
            display: block!important;
        }
        .navbar-light .nav-link:hover{
            background: #34c898;
            color: #fff!important;
        }
        .bg-grey-light{
            background: #eaefef!important;
            box-shadow: 0 5px 10px rgba(0,0,0,0.6);
        }
        .navbar-brand{
            text-transform: uppercase!important;
        }
        .navbar-brand:hover{
            color:#34ad89!important;
            text-shadow: 0 0 1px 2px rgba(0,0,0,0.5);
        }
        .nav-item{
            text-transform: uppercase;
        }
        .footer-menu .nav-link{
            padding:5px 0!important;
            color: #34ad89!important;
            /* margin:  */
        }
        address p {
            margin:0!important;
            padding: 0!important;
            /* line-height: 95%; */
            color: #efefef;
        }
        .carousel-indicators li{
            width: 20px!important;
            height: 10px!important;
        }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ url('css/carousel.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-grey-light navbar-laravel fixed-top navbar-default" style="height:75px!important">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-home"></i>
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a href="/" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="/profil" class="nav-link">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="/guru" class="nav-link">Guru</a>
                        </li>
                        <li class="nav-item">
                            <a href="/siswa" class="nav-link">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a href="/fasilitas" class="nav-link">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a href="/ekskul" class="nav-link">Ekstrakurikuler</a>
                        </li>
                        <li class="nav-item">
                            <a href="/galeri" class="nav-link">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">{{ __('Login') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Register') }}</a>
                        </li> --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main>

        {{-- <div class="container"> --}}
            @yield('content')
        {{-- </div> --}}
    </main>
    <footer style="background:#222;padding: 20px;box-sizing:border-box;">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <ul style="margin:0; list-style:none; padding:0!important;" class="footer-menu">
                        <li>MENU:</li>
                        <li>
                            <a href="/" class="nav-link">Beranda</a>
                        </li>
                        <li>
                            <a href="/profil" class="nav-link">Profil</a>
                        </li>
                        <li>
                            <a href="/guru" class="nav-link">Guru</a>
                        </li>
                        <li>
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul style="margin:0; list-style:none; padding:0!important;" class="footer-menu">
                            <li>Terima Kasih:</li>
                            <li>
                                <a href="https://laravel.io" >Laravel</a>
                            </li>
                            <li>
                                <a href="https://jquery.com" >jQuery</a>
                            </li>
                            <li>
                                <a href="https://getbootstrap.com">Bootstrap</a>
                            </li>
                            <li>
                                <a href="#" >Laravel Excel</a>
                            </li>
                        </ul>
                </div>
                <div class="col-md-3">
                    {{-- <canvas> --}}
                        <ul style="margin:0; list-style:none; padding:0!important;" class="footer-menu">
                            <li>Alamat:</li>
                        </ul>
                        <address>
                            <p>Jl. Raya Sengon No. 293</p>
                            <p>Dalisodo </p>
                            <p>Kec. Wagir - Kode Pos: 65158 </p>
                            <p>Kab. Malang</p>
                            <p>https://sdn1bedalisodo.sch.id</p>
                        </address>

                    {{-- </canvas> --}}
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="200px" fill="orange">

                        </svg>
                </div>
            </div>
            <hr class="dark" style="border-color:#111;">
        </div>
        <div class="row-fluid">
            <div class="container text-center" >
                <p style="margin: 20px auto 0px auto;">Hak cipta &copy; 2019 <a href="mailto:matthelosh@gmail.com">Mat Soleh</a>
                </p>

            </div>
        </div>
    </footer>

    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
