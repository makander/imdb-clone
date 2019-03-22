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
        <h2>Cast</h2>
            @foreach ($cast as $actor)

            <p>{{ $actor }}</p>

            @endforeach


    </div>
</body>
</html>