
<?php $__env->startSection('content'); ?>


<div class="container">


<div>
    <h1>Lists Overview</h1>
</div>

<form class="form-inline" form method="POST" action="<?php echo e(route('lists.create')); ?>">
<?php echo csrf_field(); ?>
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Create List" name="list_name">

  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form> 

<ul class="list-unstyled">
    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="">

     <a class="btn btn-link" href="/movielist/<?php echo e($list->id); ?>"> <?php echo e($list->list_name); ?></a>
     
        <form method="POST" class="form-check form-check-inline" action="<?php echo e(route('lists.destroy', [$list->id])); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?> <button type="submit" class="btn btn-primary mb-2">
                Delete</button>
        </form>

        <form method="GET" class="form-check form-check-inline" action="<?php echo e(route('lists.update', [$list->id])); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <input type="text" name="updated_name" placeholder="edit name" class="form-control mb-2 mr-sm-2">
            <button type="submit" class="btn btn-primary mb-2">Edit</button>
        </form>

    </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>