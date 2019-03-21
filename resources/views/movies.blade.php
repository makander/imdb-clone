<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
</head>
<body>
    <div>
        <h2>Movies</h2>
            @foreach ($movies as $movie)

            <p>{{ $movie }}</p>

            @endforeach


    </div>
</body>
</html>