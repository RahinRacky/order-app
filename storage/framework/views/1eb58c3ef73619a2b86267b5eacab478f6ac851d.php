<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body row text-center">
                    <div class="col-md-12">
                        <table class="table table-dark">
                            <thead class="thead-dark">
                                <tr><th>Order Id</th><th>Total</th><th></th></tr>
                            </thead>
                            <tbody>
                                <?php if(count($orders) == 0): ?>
                                <tr><td colspan="2"><?php echo e(__('No Orders!!!')); ?></td></tr>
                                <?php endif; ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="table-primary"><td><?php echo e($order->id); ?></td><td><?php echo e(sprintf("%0.2f", $order->total)); ?></td><td></td></tr>
                                    <?php if(count($order->orderDetails) > 0): ?>
                                        <tr class="table-success">
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">SubTotal</th>
                                        </tr>
                                        <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="table-success"><td><?php echo e($detail->product_name); ?></td><td><?php echo e($detail->quantity); ?></td><td><?php echo e(sprintf("%0.2f", $detail->subtotal)); ?></td></tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH J:\Laravel Interview\OrderApp\resources\views/orders.blade.php ENDPATH**/ ?>