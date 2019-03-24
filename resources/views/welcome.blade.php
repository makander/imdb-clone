<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Imdb Clone</title>

</head>
<header>
    <nav>
        <div>
            @include('auth.login')
        </div>
    </nav>
</header>

<body>

    <div>
        <h2>Welcome to diMb</h2>
        <p>Here you can se our listed <a href="/movies">movies </a>. </p>
        <p>Here you can se our listed <a href="/series">series</a>.</p>
        <p>Here you can se our listed <a href="/cast">Cast</a>.</p>
    </div>


</body>

</html>