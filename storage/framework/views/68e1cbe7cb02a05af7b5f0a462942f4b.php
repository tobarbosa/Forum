<?php
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.navigationDashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex-1 flex flex-col p-2 h-full w-full">
        <div name="header">
            <h2 class="font-semibold text-3xl leading-tight pt-10 pb-4">
                <?php echo e(__('Tópicos')); ?>

            </h2>
        </div>

        

        <div class="py-7">
            <div>
                <a href="<?php echo e(route('newTopic')); ?>"
                    class="bg-red-200 text-gray-700 p-2 border border-transparent rounded-md font-semibold text-lg uppercase tracking-widest hover:bg-red-300 active:bg-red-400 focus:outline-none focus:ring-1 transition ease-in-out duration-150">
                    Criar novo tópico
                </a>
            </div>
            <div class="py-7">
                <?php if($topics->isNotEmpty()): ?>
                    <div class="flex-1 flex items-center justify-center">
                        <div
                            class="flex flex-col items-center justify-center rounded-2xl w-6xl bg-red-200 text-gray-700 p-5">
                            <ul class="flex flex-col gap-2 py-3 w-full">
                                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="flex flex-row gap-2 rounded-md shadow-sm bg-red-700 text-gray-200 p-2">
                                        <a href="<?php echo e(route('topic.index', $topic->id)); ?>" class="w-19/20">
                                            <h3
                                                class="text-left underline text-xl font-bold text-shadow-sm text-shadow-red-600">
                                                <?php echo e($topic->title); ?></h3>
                                            <p class="text-left max-h-12 line-clamp-2"><?php echo e($topic->description); ?></p>
                                            <p class="text-right text-shadow-sm text-sm"><?php echo e(Auth::user()->name); ?></p>
                                            <p class="text-right text-shadow-sm text-xs"><?php echo e(Auth::user()->username); ?></p>
                                            <p class="text-right text-shadow-sm">
                                                <?php if($topic->created_at->ne($topic->updated_at)): ?>
                                                    <span class="text-gray-400 text-xs">Editado</span>
                                                <?php endif; ?>
                                                <?php echo e($topic->updated_at->format('d/m/Y H:i')); ?>

                                            </p>
                                        </a>
                                        <div class="flex flex-col justify-end gap-1 w-1/20 text-gray-700">
                                            <a href="<?php echo e(route('editTopic', $topic->id)); ?>"
                                                class="flex justify-center items-center h-1/2 bg-red-200 rounded-t-md">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-square-pen'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-10 w-10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </a>
                                            <form action="<?php echo e(route('topic.delete', ['topic' => $topic->id])); ?>"
                                                method="post"
                                                onsubmit="return confirm('Deseja realmente excluir este tópico?')"
                                                class="flex flex-col justify-center items-center h-1/2 py-2 pl-1 bg-red-200 rounded-b-md">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button type="submit">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 w-10 h-10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            </form>
                                        </div>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/dashboard.blade.php ENDPATH**/ ?>