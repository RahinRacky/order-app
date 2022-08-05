<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body row text-center">
                    <div class="tex-center text-success"><?php echo e(__('Order Placed Successfully!!!')); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Laravel Interview\OrderApp\resources\views/checkout.blade.php ENDPATH**/ ?>