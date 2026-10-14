<?php $__env->startSection('navbar'); ?>
    <div class="w-screen">
        <nav class="flex w-full h-17.5 bg-[#333] m-0 p-0 box-border">
            <div class="flex-1 flex items-center justify-center text-white border-r border-[#444]">1</div>
            <div class="flex-2 flex items-center justify-center text-white border-r border-[#444]">2</div>
            <div class="flex-1 flex items-center justify-center text-white">3</div>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="text-4xl font-bold"><?php echo e($user->name); ?></h1>

    <h3 class="text-base font-normal my-2">Primeira informação importante</h3>
    <h3 class="text-base font-normal my-2"><?php echo e($user->email); ?></h3>
    <h3 class="text-base font-normal my-2"><?php echo e($user->password); ?></h3>
    <h3 class="text-base font-normal my-2"><?php echo e($user->created_at); ?></h3>
    <h3 class="text-base font-normal my-2"><?php echo e($user->updated_at); ?></h3>
    <h3 class="text-base font-normal my-2"><?php echo e($user->items); ?></h3>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/user.blade.php ENDPATH**/ ?>