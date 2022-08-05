<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Welcome ' . Auth::user()->name)); ?></div>

                <div class="card-body row text-center">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 p-3">
                            <img src="<?php echo e(asset($product->product_image)); ?>" alt="<?php echo e($product->product_name); ?>" style="width: 200px;height:200px">
                            <h2><?php echo e($product->product_name); ?></h2>
                            <?php if(empty($product->quantity)): ?>
                                <a href="<?php echo e(url('product/addToCart/' . $product->product_category_id . '/' . $product->id )); ?>" class="btn btn-success">Add To Cart</a>
                            <?php else: ?>
                                <a href="#" class="btn btn-outline-success">Added To Cart</a>
                            <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Laravel Interview\OrderApp\resources\views/categoryproducts.blade.php ENDPATH**/ ?>