
<?php $__env->startSection('content'); ?>
<div>
    <h2>Welcome to diMb</h2>
    <p>Here you can se our listed <a href="/movies">movies </a></p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>