<?php
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
        <div class="text-3xl font-bold text-shadow-lg">Tópicos</div>
        <ul class="flex flex-col gap-2 py-3 w-full">
            <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="rounded-md shadow-sm bg-red-200 text-gray-700 shadow-red-300 p-2">
                    <a href="<?php echo e(route('topic.index', $topic->id)); ?>">
                        <h3 class="text-left underline text-xl font-bold text-shadow-sm"><?php echo e($topic->title); ?></h3>
                        <p class="text-left max-h-12 line-clamp-2"><?php echo e($topic->description); ?></p>
                        <p class="text-right text-shadow-sm text-sm"><?php echo e($topic->user->name); ?></p>
                        <p class="text-right text-shadow-sm text-xs"><?php echo e($topic->user->username); ?></p>
                        <p class="text-right text-shadow-sm">
                            <?php if($topic->created_at->ne($topic->updated_at)): ?>
                                <span class="text-gray-400 text-xs">Editado</span>
                            <?php endif; ?>
                            <?php echo e($topic->updated_at->format('d/m/Y H:i')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/topics.blade.php ENDPATH**/ ?>