<nav x-data="{ open: false }" class="bg-red-300 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="<?php echo e(route('home')); ?>">
                        <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => ['class' => 'block h-9 w-auto fill-current text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-9 w-auto fill-current text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
                    </a>
                </div>

                <!-- Home -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? $currentBar : $sideBar); ?>">
                        <?php echo e(__('Home')); ?>

                    </a>
                </div>

                <!-- Topics -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="<?php echo e(route('topic')); ?>" class="<?php echo e(request()->routeIs('topic') ? $currentBar : $sideBar); ?>">
                        <?php echo e(__('Tópicos')); ?>

                    </a>
                </div>

                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="<?php echo e(route('users')); ?>" class="<?php echo e(request()->routeIs('users') ? $currentBar : $sideBar); ?>">
                        <?php echo e(__('Usuários')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/html/resources/views/layouts/navigationHome.blade.php ENDPATH**/ ?>