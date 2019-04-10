<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'dimb') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body style="overflow-x:hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    diMb
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <div class="form-inline">
                            <form method="POST" action="search">
                                <input class="form-control" id="searchField" type="text" placeholder="Search movies"
                                    aria-label="Search" name="search">
                                {{ csrf_field() }}
                                <button class=" btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>

                        <a role="button" class="btn btn-outline-success my-2 my-sm-0 ml-1"
                            href="{{ url('/advancedsearch') }}">
                            Advanced search
                        </a>
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

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lists')}}">My lists</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}<span class="caret"></span>
                            </a>



                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if ((auth()->user()->role == 1 || auth()->user()->role == 2))
                                <a class="dropdown-item" href="{{ route('admin') }}">Dashboard</a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            <!--  -->
            @yield('content')
        </main>
    </div>

    <footer>
        <div class="footer-content">
            <h4>About diMb</h4>
            <p>diMb is an imdbclone school project made by Nils Makander, Astrid Sinabian, Robin Mossberg and Peter
                Heinum. We are students at Chas Academy in Stockholm, Sweden.</p>
        </div>

        <div class="footer-links">
            <h4>diMb</h4>
            <ul>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                <li><a href="https://www.facebook.se">Facebook</a></li>
                <li><a href="https://www.linkedin.se">Linked In</a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Movies</h4>
            <ul>
                <li><a href="{{ url('/') }}">Top Rated Movies</a></li>
                <li><a href="#">Top Rated Series</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>