
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lists.css')); ?>" >



<div>
    <?php if($movieImageArray): ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <?php $__currentLoopData = $movieImageArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movieImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key == 0): ?>
        <div class="carousel-item active">
            <?php else: ?> 
        <div class="carousel-item">
            <?php endif; ?>
            <div style="
        background-image: url('https://image.tmdb.org/t/p/original/<?php echo e($movieImageArray[$key]); ?>');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
    <?php endif; ?>

</div>



<div>
    <h1>Watchlists</h1>
</div>
<div class="container xcontainer">


    <form class="form-inline" form method="POST" action="<?php echo e(route('lists.create')); ?>">
    <?php echo csrf_field(); ?>
        <div class="xsearch">
            <label class="sr-only" for="inlineFormInputName2">Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Create List" name="list_name">

            <button type="submit" class="btn btn-outline-success mb-2">Submit</button>

        </div>
    </form> 

    <ul class="container xcontainer">
        <?php if($lists): ?>
        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="card ml-5 mt-3 bg-dark xcard shadow">
            <a href="/movielist/<?php echo e($list->id); ?>">
            <?php if(in_array($key, $movieImageArray)): ?>
                <img class="card-img-top" style="
                background-image: url('https://image.tmdb.org/t/p/original/<?php echo e($movieImageArray[$key]); ?>');
                height:35vh;
                background-position: center;
                background-size: cover;
                ">
            <?php else: ?>
                <img class="card-img-top" style="
                    height:35vh;
                    background-color: #343a40;
                    ">
            <?php endif; ?>
                <div class="container bg-dark">

                    <a class="btn btn-link xa" href="/movielist/<?php echo e($list->id); ?>"> <?php echo e($list->list_name); ?></a>
                    <br>
                    
                    
                    <form method="GET" class="form-check form-check-inline" action="<?php echo e(route('lists.update', [$list->id])); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <input type="text" name="updated_name" placeholder="edit name" class="form-control mb-2 mr-sm-2">
                        <button type="submit" class="btn btn-outline-success mb-2">Edit</button>
                    </form>
                    
                    <form method="POST" class="form-check form-check-inline" action="<?php echo e(route('lists.destroy', [$list->id])); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?> <button type="submit" class="btn btn-outline-success mb-2">
                            Delete</button>
                    </form>
                </div>
            </a>
            
        </li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>

</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>