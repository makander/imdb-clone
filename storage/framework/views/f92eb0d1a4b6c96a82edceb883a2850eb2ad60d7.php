
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">


<div>
    <div id="carousel" class="carousel slide d-none d-md-block d-xl-non" data-ride="carousel">
        <div class="carousel-item active">
            <div id="carousel-1" style="
        background-image: url('https://image.tmdb.org/t/p/original/<?php echo e($movies[1]->backdrop_path); ?>');">
            </div>
        </div>
        <div class="carousel-item">
            <div class="media">
                <div id="carousel-2" style="
        background-image: url('https://image.tmdb.org/t/p/original/<?php echo e($movies[0]->backdrop_path); ?>');
        "></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="media">
                <div id="carousel-2" style="
        background-image: url('https://image.tmdb.org/t/p/original/<?php echo e($movies[2]->backdrop_path); ?>');">
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center">

        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="card p-2 m-2 text-center shadow" style="width: 16rem;">
            <img class=" card-img-top" src="http://image.tmdb.org/t/p/w500//<?php echo e($match->poster_path); ?>"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/movies/<?php echo e($match->id); ?>">
                        <b><?php echo e($match->title); ?></b> </h5></a>
                <p>(<?php echo e($match->release_date); ?>)
                </p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>