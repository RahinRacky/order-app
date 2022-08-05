<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Welcome ' . Auth::user()->name)); ?></div>

                <div class="card-body row text-center">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <a href="<?php echo e(url("/product-category/" . $category->id)); ?>" class="text-decoration-none">
                            <img src="<?php echo e(asset($category->product_category_image)); ?>" alt="<?php echo e($category->product_category); ?>" style="width: 200px;height:200px">
                            <h2><?php echo e($category->product_category); ?></h2>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Laravel Interview\OrderApp\resources\views/home.blade.php ENDPATH**/ ?>