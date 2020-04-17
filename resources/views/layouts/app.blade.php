<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bloggers</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Body css style -->
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">

    {{--    Font awesome --}}
    <script src="https://kit.fontawesome.com/766220ba47.js" crossorigin="anonymous"></script>

    {{--  AOS vue js --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-gradient-black">
        <div class="container">
            <div class="mr-2">
                <a href="/"><img class="filter-white" src="{{ asset('storage/svg/navbar-blog-icon.svg') }}"
                                 alt="blog svg" style="max-height: 32px"></a>
            </div>

            <div class="mt-1 nav navbar-header">
                <a class="navbar-brand mx-auto" href="{{ url('/') }} " style="font-family: 'Nunito', sans-serif">
                    BLOGGERS
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li>

                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
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
        @yield('content')
    </main>

    <footer class="container-fluid p-0 mt-10 ">
        <div class="row py-5 justify-content-center">
            <div class="col-12 text-center">

                <h1 class="text-lightDark" style="font-family: 'Fira Code Medium'">SOME FOOTER STUFF</h1>
            </div>
            <div class="col-12 text-center pt-3">
                <p class="text-lightDark">Powered by Adbal</p>
            </div>


            <div class="col-12 small text-white text-center">Copyright &copy; license {{date('Y')}}</div>
            <div class="col-12 small text-white text-center">All rights reserved</div>

        </div>
    </footer>

</div>
</body>
</html>
