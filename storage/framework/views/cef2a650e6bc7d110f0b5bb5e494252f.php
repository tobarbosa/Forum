<?php
    $standardPhoto = 'images/defaults/perfil.jpg';
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.navigationHome', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col justify-center items-center py-2 w-6xl">
        <div class="text-3xl font-bold text-shadow-lg">Usuários</div>
        <div class="grid grid-cols-3 gap-2 py-3">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="border w-50 h-80 rounded-md overflow-hidden" href="<?php echo e(route('user.index', $user->id)); ?>">
                    <img src="<?php echo e($user->photo === $standardPhoto ? asset($user->photo) : Storage::url($user->photo)); ?>"
                        alt="<?php echo e($user->name); ?>" class="h-8/10 w-full">
                    <div class="flex flex-col items-start h-2/10 w-full p-2">
                        <p class="w-full truncate text-start font-semibold text-base"><?php echo e($user->name); ?></p>
                        <p class="w-full truncate text-start font-semibold text-base"><?php echo e($user->username); ?>

                        </p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div>
            <?php echo e($users->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/users.blade.php ENDPATH**/ ?>