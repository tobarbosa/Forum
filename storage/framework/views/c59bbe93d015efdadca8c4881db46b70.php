<?php $__env->startSection('title', 'Dá uma olhada nisso aqui'); ?>

<?php $__env->startSection('content'); ?>
    <div class="w-full h-full m-0 py-2 px-1">
        <!-- It always seems impossible until it is done. - Nelson Mandela -->
        <?php $__currentLoopData = $listItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <h1><?php echo e($item->name); ?></h1>
            </div>
            <div>
                <h2><?php echo e($item->summary); ?></h2>
            </div>
            <div>
                <h2><?php echo e($item->genres); ?></h2>
            </div>
            <div>
                <h2><?php echo e($item->comments); ?></h2>
            </div>
            <?php if($item->image): ?>
                <div class="flex justify-center">
                    <img src="<?php echo e(Storage::url($item->image)); ?>" alt="" width="100">
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div><?php echo e($listItems->onEachSide(1)->links()); ?></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/listItems.blade.php ENDPATH**/ ?>