<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'dimb')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/footer.css')); ?>" rel="stylesheet">
</head>

<body style="overflow-x:hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    dimb
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <div class="form-inline">
                            <form method="POST" action="search">
                                <input class="form-control" id="searchField" type="text" placeholder="Search movies"
                                    aria-label="Search" name="search">
                                <?php echo e(csrf_field()); ?>

                                <button class=" btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>

                        <a role="button" class="btn btn-outline-success my-2 my-sm-0 ml-1"
                            href="<?php echo e(url('/advancedsearch')); ?>">
                            Advanced search
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('lists')); ?>">My lists</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?><span class="caret"></span>
                            </a>



                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <?php if((auth()->user()->role == 1 || auth()->user()->role == 2)): ?>
                                <a class="dropdown-item" href="<?php echo e(route('admin')); ?>">Dashboard</a>
                                <?php endif; ?>

                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <footer>
        <div class="footer-content">
            <h4>About Dimb</h4>
            <p>Dimb is an imdbclone school project made by Nils Makander, Astrid Sinabian, Robin Mossberg and Peter
                Heinum. We are students at Chas Academy in Stockholm, Sweden.</p>
        </div>

        <div class="footer-links">
            <h4>Dimb</h4>
            <ul>
                <li><a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                <li><a href="https://www.facebook.se">Facebook</a></li>
                <li><a href="https://www.linkedin.se">Linked In</a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Movies</h4>
            <ul>
                <li><a href="<?php echo e(url('/')); ?>">Top Rated Movies</a></li>
                <li><a href="#">Top Rated Series</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>