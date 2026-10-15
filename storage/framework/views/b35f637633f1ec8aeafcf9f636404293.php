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
    <div class="flex flex-col w-6xl gap-3">
        <div class="flex flex-row gap-3 bg-red-200 text-gray-700 p-5 rounded-2xl">
            <div class="w-3/10">
                <img src="<?php echo e($user->photo === $standardPhoto ? asset($user->photo) : Storage::url($user->photo)); ?>"
                    alt="<?php echo e($user->name); ?>">
            </div>
            <div class="w-7/10 text-left text-2xl">
                <p><?php echo e($user->name); ?></p>
                <p><?php echo e($user->username); ?></p>
            </div>
        </div>
        <div class="py-7">
            <?php if($topics->isNotEmpty()): ?>
                <div class="flex-1 flex items-center justify-center">
                    <div class="flex flex-col items-center justify-center rounded-2xl w-6xl bg-red-200 text-gray-700 p-5">
                        <div class="text-4xl pb-2 font-semibold">Tópicos do usuário</div>
                        <ul class="flex flex-col gap-2 py-3 w-full">
                            <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex flex-row gap-2 rounded-md shadow-sm bg-red-700 text-gray-200 p-2">
                                    <a href="<?php echo e(route('topic.index', $topic->id)); ?>" class="w-full">
                                        <h3
                                            class="text-left underline text-xl font-bold text-shadow-sm text-shadow-red-600">
                                            <?php echo e($topic->title); ?></h3>
                                        <p class="text-left max-h-12 line-clamp-2"><?php echo e($topic->description); ?></p>
                                        <p class="text-right text-shadow-sm text-sm"><?php echo e($user->name); ?></p>
                                        <p class="text-right text-shadow-sm text-xs"><?php echo e($user->username); ?></p>
                                        <p class="text-right text-shadow-sm">
                                            <?php if($topic->created_at->ne($topic->updated_at)): ?>
                                                <span class="text-gray-400 text-xs">Editado</span>
                                            <?php endif; ?>
                                            <?php echo e($topic->updated_at->format('d/m/Y H:i')); ?>

                                        </p>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div>
                            <?php echo e($topics->links()); ?>

                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex-1 flex items-center justify-center">
                    <div class="flex items-center justify-center rounded-2xl bg-red-200 text-gray-700 w-40 h-30">
                        Não tem Tópicos
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/user.blade.php ENDPATH**/ ?>