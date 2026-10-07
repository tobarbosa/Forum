<?php
    $standardPhoto = 'images/defaults/perfil.jpg';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'No início dos tempos...'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body>
    <div class="min-h-screen w-full flex flex-col bg-[#e53e3e] text-white text-center">
        <?php $__env->startSection('header'); ?>
            <div class="flex justify-center items-center h-14 w-full">
                <div class="w-1/3"></div>
                <div class="w-1/3"><a class="px-1 py-0.5 hover:text-black" href="<?php echo e(route('home')); ?>">HOME</a></div>
                <div class="flex w-1/3 h-full justify-end">
                    <div class="flex items-center justify-center">
                        <?php if(auth()->guard()->check()): ?>
                            <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '14']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '14']); ?>
                                 <?php $__env->slot('trigger', null, []); ?> 
                                    <button
                                        class="flex items-center justify-center border border-transparent text-sm font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        
                                        <img src="<?php echo e(Auth::user()->photo === $standardPhoto ? asset(Auth::user()->photo) : Storage::url(Auth::user()->photo)); ?>"
                                            alt="<?php echo e(Auth::user()->name); ?>"
                                            class="h-13 w-13 rounded-full object-cover shadow-2xl">
                                        <span
                                            class="flex justify-center items-center p-2 text-sm font-medium"><?php echo e(Auth::user()->name); ?></span>
                                    </button>
                                 <?php $__env->endSlot(); ?>

                                 <?php $__env->slot('content', null, []); ?> 
                                    <div
                                        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-800 text-shadow-2xs font-bold underline">
                                        <?php echo e('@' . Auth::user()->username); ?>

                                    </div>
                                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
                                        <?php echo e(__('Perfil')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard'))]); ?>
                                        <?php echo e(__('Atividades')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>

                                    <!-- Authentication -->
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']); ?>
                                            <?php echo e(__('Sair')); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                    </form>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>"
                                class="flex items-center h-full bg-red-700 justify-center px-5 py-1.5 border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] text-sm leading-normal">
                                Log in
                            </a>

                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>"
                                    class="flex items-center h-full bg-red-700 justify-center px-5 py-1.5 border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] text-sm leading-normal">
                                    Register
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php echo $__env->yieldSection(); ?>
        <?php $__env->startSection('navbar'); ?>
            <div class="w-full">
                <nav class="flex h-16 bg-red-900 m-0 p-0 box-border">

                    <!-- Div 1 (Vermelho Escuro) -->
                    <a href="<?php echo e(route('users')); ?>"
                        class="flex-1 flex items-center justify-center text-red-100 bg-red-800 border-r border-red-900">
                        Usuários
                    </a>

                    <!-- Div 2 (Vermelho Principal) -->
                    <a href="<?php echo e(route('list.items')); ?>"
                        class="flex-2 flex items-center justify-center text-red-100 bg-red-700 border-r border-red-900">
                        Itens da lista
                    </a>

                    <!-- Div 3 (Vermelho Mais Claro) -->
                    <a href="<?php echo e(route('item.new')); ?>"
                        class="flex-1 flex items-center justify-center text-red-100 bg-red-600">
                        Perfil / Direita
                    </a>

                </nav>
            </div>
        <?php echo $__env->yieldSection(); ?>
        <div class="flex-1 w-full h-full flex flex-col items-center py-10">
            
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php $__env->startSection('footer'); ?>
            <div
                class="flex items-center justify-center h-20 text-lg text-shadow-sm bg-gradient-to-l from-red-400 to-red-100">
                <span class="bg-gradient-to-r from-red-600 to-black text-transparent bg-clip-text ">
                    Em homenagem ao aprendizado!
                </span>
            </div>
        <?php echo $__env->yieldSection(); ?>
    </div>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/default.blade.php ENDPATH**/ ?>