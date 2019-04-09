
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/movielist.css')); ?>" >

<div class="container xcontainer">
    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card ml-5 mt-3" style="width: 14rem;">
        <img class="card-img-top" src="http://image.tmdb.org/t/p/w400//<?php echo e($table->movie_pic); ?>" alt="">
        <div class="card-body">
            <p class="card-text">
                <a href="../movies/<?php echo e($table->movie_id); ?>"> <?php echo e($table->movie_title); ?></a>  
            </p>
        </div>
            <form method="POST" action="<?php echo e(route('movielist.delete', [$table->id])); ?>"> <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?> <button type="submit">
                <a>Delete</a></button>
            </form>
    </div>   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>