<?php
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
?>

<script>
    function removeImage(id) {
        document.getElementById('image-' + id).remove();
        let container = document.getElementById('imagesToRemove');
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'imgToRemove[]';
        input.value = id;
        container.append(input);
    }
</script>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.navigationDashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col w-6xl p-2 gap-3 text-left">
        
        <div>
            <a href="<?php echo e(back()->getTargetUrl()); ?>" class="flex gap-2 items-center w-20">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
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
                <span>Voltar</span>
            </a>
        </div>
        
        <div class="flex flex-col gap-4 rounded-sm shadow p-3">
            <form action="<?php echo e(isset($topic) ? route('topic.edit', $topic->id) : route('topic.store')); ?>" method="post"
                enctype="multipart/form-data" class="flex flex-col gap-4">
                <?php echo csrf_field(); ?>
                
                <label for="title"
                    class="text-3xl p-1 after:content-['*'] after:ml-0.5 after:text-gray-300">Título</label>
                <input type="text" name="title" id="title" class="border p-1"
                    value="<?php echo e(isset($topic) ? old('title') ?? $topic->title : old('title')); ?>" required>
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-gray-300"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="description"
                    class="text-3xl p-1 after:content-['*'] after:ml-0.5 after:text-gray-300">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="10" class="border p-1" required>
                    <?php echo e(isset($topic) ? old('description') ?? $topic->description : old('description')); ?>

                </textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-gray-300"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <?php if(isset($topic) && $topic?->images?->isNotEmpty()): ?>
                    <div class="grid grid-cols-10 gap-1">
                        <?php $__currentLoopData = $topic->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="image-<?php echo e($image->id); ?>">
                                <button type="button" class="absolute" onclick="removeImage(<?php echo e($image->id); ?>)">
                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 w-1/10 h-1/10 transition-all duration-150 hover:h-1/9 hover:w-1/9 hover:drop-shadow-lg hover:stroke-red-700 hover:stroke-3']); ?>
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
                                <img src="<?php echo e(Storage::url($image->image)); ?>" alt="" class="rounded-sm">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="inline-flex gap-2">
                    <label for="images" class="font-medium text-lg mb-1">Imagens:</label>

                    <input type="file" name="images[]" accept="image/*" id="images" value="<?php echo e(old('images[]')); ?>"
                        multiple
                        class="text-sm file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-xs file:font-semibold
                        file:uppercase file:tracking-widest
                        file:bg-red-50 file:text-gray-700
                        hover:file:bg-red-100
                        cursor-pointer
                        rounded-md shadow-sm shadow-red-300">
                    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-gray-300"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-red-50 hover:bg-red-100 w-24 p-1 border border-transparent rounded-md text-gray-700 text-xs uppercase tracking-widest font-semibold"><?php echo e(isset($topic) ? 'Editar' : 'Criar'); ?></button>
                </div>
                <div type="text" name="toRemove" id="imagesToRemove" hidden></div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/newTopic.blade.php ENDPATH**/ ?>