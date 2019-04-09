
<?php $__env->startSection('content'); ?>

<div>
    <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/<?php echo e($details->poster_path); ?>">
    <h1><?php echo e($details->title); ?></h1>
    <p> <?php echo e($details->overview); ?> </p>
</div>


<div>
    <form method="POST" action="/movies/<?php echo e($details->id); ?>/review" placeholder="Dead Link">
        <?php echo csrf_field(); ?>

        <textarea name="content" rows="4" cols="50" /></textarea>
        <button type="submit">
            Submit
        </button>
    </form>
</div>


<ul>
    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <?php echo e($review->author_id); ?>

        <?php echo e($review->content); ?>


        <?php if(auth()->user()->id == $review->author_id): ?>
        <form method="POST" action="<?php echo e(route('review.destroy', [$review->id])); ?>">
            <?php echo e(csrf_field()); ?> <?php echo e(method_field('DELETE')); ?> <button type="submit">
                Delete</button>
        </form>

        <form method="GET" action="<?php echo e(route('review.update', [$review->id])); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <input type="text" name="content" placeholder="edit name">
            <button type="submit">Edit</button>
        </form>

        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php echo e($reviews); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>