
<?php $__env->startSection('content'); ?>

this is the list of movies in your list

<?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e($table->movie_id); ?>"> <?php echo e($table->movie_title); ?></a>
        <form method="POST" action="<?php echo e(route('movielist.delete', [$table->id])); ?>"> <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?> <button type="submit">
                Delete</button>
        </form>

    <!-- <li><?php echo e($table->movie_title); ?></li> -->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>