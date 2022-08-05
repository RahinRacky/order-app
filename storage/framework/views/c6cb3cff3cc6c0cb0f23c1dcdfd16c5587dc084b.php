<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body row text-center">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>
                            </thead>
                            <tbody>
                                <?php if(count($cart) == 0): ?>
                                <tr><td colspan="4"><?php echo e(__('Please Add Product!!!')); ?></td></tr>
                                <?php endif; ?>
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr><td><?php echo e($product->product_name); ?></td><td><?php echo e($product->price); ?></td><td><a href="<?php echo e(url('/cart/add/' . $product->productId)); ?>" class="btn btn-outline-success"><i class="fa fa-plus"></i></a> &nbsp; <?php echo e($product->quantity); ?> &nbsp; <a href="<?php echo e(url('/cart/reduce/' . $product->productId)); ?>" class="btn btn-outline-warning"><i class="fa fa-minus"></i></a> &nbsp; <a href="<?php echo e(url('/cart/remove/' . $product->productId)); ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td><td><?php echo e(sprintf("%0.2f", $product->subtotal)); ?></td></tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr><th colspan="3" class="text-right">Total</th><th><?php echo e(sprintf("%0.2f", $total)); ?></th></tr>
                            </tfoot>
                        </table>
                        <a href="<?php echo e(url('/cart/checkout')); ?>" class="btn btn-primary text-center">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Laravel Interview\OrderApp\resources\views/cart.blade.php ENDPATH**/ ?>