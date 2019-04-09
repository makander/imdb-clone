<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <title>Movies</title>
</head>

<body>
    <div class="main">
        <nav class="navbar navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand text-light">Navbar</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="jumbotron">
            <div class="container bg-light rounded p-5">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa omnis corporis odit vel iste harum!
                    Libero, officia quisquam voluptates quam tempore officiis nam? Nemo consequatur amet reiciendis
                    harum rem inventore.
                </p>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" id="searchField" type="search" placeholder="Search movies"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="searchMovie()"
                        type="submit">Search</button>
                </form>
            </div>
        </div>


        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="http://image.tmdb.org/t/p/w45//<?php echo e($match->poster_path); ?>" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">
                    <a href="/movies/<?php echo e($match->id); ?>" style="text-decoration:none;color:black">
                        <b><?php echo e($match->title); ?></b> (<?php echo e($match->release_date); ?>)</a>
                </p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>

</html>
<script>
    function searchMovie() {
        let query = document.querySelector('#searchField').value;
        window.location.replace(`http://dimb.test/movies/search/${query}`);
    }
</script>