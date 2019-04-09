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
            <?php $__currentLoopData = $cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <p><?php echo e($actor); ?></p>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</body>
</html>