<?php $__env->startSection('title', 'Dá uma olhada nisso aqui'); ?>

<?php $__env->startSection('content'); ?>
    <div style="width: 100vw; height: 100vh; margin: 0; padding: 0;">
        <!-- It always seems impossible until it is done. - Nelson Mandela -->
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <h1><?php echo e($user->name); ?></h1>
            </div>
            <div>
                <h2><?php echo e($user->email); ?></h2>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/users.blade.php ENDPATH**/ ?>